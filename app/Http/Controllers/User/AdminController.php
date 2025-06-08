<?php

namespace App\Http\Controllers\User;

use App\Exports\LaporanExport;
use App\Exports\UsersExport;
use App\Http\Controllers\Controller;
use App\Http\Controllers\laporancontroller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Transaksi;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Intervention\Image\Laravel\Facades\Image;
// use Intervention\Image\Facades\Image;
// use Intervention\Image\Facades\Image;

use ilumintae\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class AdminController extends Controller
{

    public function show_user()
    {
        $user = User::orderBy('id', 'ASC')->paginate(10);
        return view('admin.user', compact('user'));
    }
    public function edit_user($id)
    {
        $user = User::find($id);
        return view('admin.edit_user', compact('user'));
    }
    public function update_user(request $request)
    {
        $user = User::find($request->id);
        $user->role = $request->role;
        $user->email = $request->email;
        $user->save();
        return back()->with("status", "Status changed successfully!");
    }

    public function index()
    {
        $totalAmount = Order::where('status', 'terkirim')->sum('total');
        $order = Order::orderBy('created_at', 'DESC')->paginate(5);
        $topSoldItems = OrderItem::select('product_id', DB::raw('SUM(quantity) as total_sold'))
            ->groupBy('product_id')
            ->orderByDesc('total_sold')
            ->with('product')
            ->take(5)
            ->get();
        $totalSold = OrderItem::whereHas('order', function ($query) {
            $query->where('status', 'terkirim'); // atau sesuai status sukses
        })->sum('quantity');
        $totalCustomers = User::whereHas('order')->count();

        // Data per bulan untuk grafik
        $pendapatanbulanan = Order::where('status', 'terkirim')->selectRaw('MONTH(created_at) as month, SUM(total) as total_sales')
            ->groupBy('month')
            ->pluck('total_sales', 'month')
            ->toArray();

        $pesananbulanan = Order::selectRaw('MONTH(created_at) as month, COUNT(*) as total_orders')
            ->groupBy('month')
            ->pluck('total_orders', 'month')
            ->toArray();

        $barangterjualbulanan = OrderItem::selectRaw('MONTH(created_at) as month, SUM(quantity) as total_quantity')
            ->groupBy('month')
            ->pluck('total_quantity', 'month')
            ->toArray();

        // Lengkapi agar semua bulan 1–12 ada (pakai 0 kalau tidak ada data)
        $datagrafik = [
            'pendapatan' => array_map('floatval', array_replace(array_fill(1, 12, 0), $pendapatanbulanan)),
            'pesanan' => array_map('intval', array_replace(array_fill(1, 12, 0), $pesananbulanan)),
            'items' => array_map('intval', array_replace(array_fill(1, 12, 0), $barangterjualbulanan)),
        ];

        return view('admin.dashboard', compact('order', 'totalAmount', 'topSoldItems', 'totalSold', 'totalCustomers', 'datagrafik'));
    }

    public function Product()
    {
        $product = Product::orderBy('id', 'ASC')->paginate(10);
        return view('admin.product', compact('product'));
    }

    public function tambahproduct()
    {
        return view('admin.tambah_product');
    }

    public function editproduct($id)
    {
        $product = Product::find($id);
        return view('admin.edit-product', compact('product'));
    }

    public function  hapusproduct($id)
    {
        $product = Product::find($id);
        if (File::exists(public_path('uploads/barang') . '/' . $product->gambar)) {
            File::delete(public_path('uploads/barang') . '/' . $product->gambar);
        }
        $product->delete();
        return redirect()->route('admin.product')->with('status', 'Produk berhasil dihapus');
    }

    public function storeProduct(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'deskripsi' => 'required|string',
            'Stok' => 'required|integer',
            'Status_stok' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $Product = new Product();
        $Product->nama = $request->nama;
        // $Product->slug = Str::slug($request->name);
        $Product->harga = $request->harga;
        $Product->deskripsi = $request->deskripsi;
        $Product->Stok = $request->Stok;
        $Product->Status_stok = $request->Status_stok;
        $current_timestamp = Carbon::now()->timestamp;
        if ($request->hasFile('gambar')) {
            if (File::exists(public_path('uploads/barang') . '/' . $Product->gambar)) {
                File::delete(public_path('uploads/barang') . '/' . $Product->gambar);
            }
            if (File::exists(public_path('uploads/products/detail') . '/' . $Product->gambar)) {
                File::delete(public_path('uploads/products/detail') . '/' . $Product->gambar);
            }
            $gambar = $request->file('gambar');
            $fileExtension = $gambar->extension();
            $fileName = Carbon::now()->timestamp . '.' . $fileExtension;
            $this->generateProductThumbnailImage($gambar, $fileName);
            $gambar->move(public_path('uploads/barang/original'), $fileName);
            $Product->gambar = $fileName;
        }
        $gallery_arr = array();
        $gallery_images = "";
        $counter = 1;
        if ($request->hasFile('gambar_detail')) {
            $oldGImages = explode(",", $Product->images);
            foreach ($oldGImages as $gimage) {
                if (File::exists(public_path('uploads/products') . '/' . trim($gimage))) {
                    File::delete(public_path('uploads/products') . '/' . trim($gimage));
                }
                if (File::exists(public_path('uploads/products/detail') . '/' . trim($gimage))) {
                    File::delete(public_path('uploads/products/detail') . '/' . trim($gimage));
                }
            }
            $allowedfileExtension = ['jpg', 'png', 'jpeg'];
            $files = $request->file('gambar_detail');
            foreach ($files as $file) {
                $gextension = $file->getClientOriginalExtension();
                $check = in_array($gextension, $allowedfileExtension);
                if ($check) {
                    $gfilename = $current_timestamp . "-" . $counter . "." . $gextension;
                    $this->generateProductThumbnailImage($file, $gfilename);
                    array_push($gallery_arr, $gfilename);
                    $counter = $counter + 1;
                }
            }
            $gallery_images = implode(',', $gallery_arr);
        }
        $Product->gambar_detail = $gallery_images;

        $Product->save();
        return redirect()->route('admin.product')->with('status', 'Product has been added successfully!');
    }

    public function updateproduct(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'deskripsi' => 'required|string',
            'Stok' => 'required|integer',
            'Status_stok' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $Product = Product::find($request->id);
        $Product->nama = $request->nama;
        $Product->harga = $request->harga;
        $Product->deskripsi = $request->deskripsi;
        $Product->Stok = $request->Stok;
        $Product->Status_stok = $request->Status_stok;
        $current_timestamp = Carbon::now()->timestamp;
        if ($request->hasFile('gambar')) {
            if (File::exists(public_path('uploads/barang') . '/' . $Product->gambar)) {
                File::delete(public_path('uploads/barang') . '/' . $Product->gambar);
            }
            if (File::exists(public_path('uploads/products/detail') . '/' . $Product->gambar)) {
                File::delete(public_path('uploads/products/detail') . '/' . $Product->gambar);
            }
            $gambar = $request->file('gambar');
            $fileExtension = $gambar->extension();
            $fileName = Carbon::now()->timestamp . '.' . $fileExtension;
            $this->generateProductThumbnailImage($gambar, $fileName);
            $gambar->move(public_path('uploads/barang/original'), $fileName);
            $Product->gambar = $fileName;
        }
        $gallery_arr = array();
        $gallery_images = "";
        $counter = 1;
        if ($request->hasFile('gambar_detail')) {
            $oldGImages = explode(",", $Product->images);
            foreach ($oldGImages as $gimage) {
                if (File::exists(public_path('uploads/products') . '/' . trim($gimage))) {
                    File::delete(public_path('uploads/products') . '/' . trim($gimage));
                }
                if (File::exists(public_path('uploads/products/detail') . '/' . trim($gimage))) {
                    File::delete(public_path('uploads/products/detail') . '/' . trim($gimage));
                }
            }
            $allowedfileExtension = ['jpg', 'png', 'jpeg'];
            $files = $request->file('gambar_detail');
            foreach ($files as $file) {
                $gextension = $file->getClientOriginalExtension();
                $check = in_array($gextension, $allowedfileExtension);
                if ($check) {
                    $gfilename = $current_timestamp . "-" . $counter . "." . $gextension;
                    $this->generateProductThumbnailImage($file, $gfilename);
                    array_push($gallery_arr, $gfilename);
                    $counter = $counter + 1;
                }
            }
            $gallery_images = implode(',', $gallery_arr);
        }
        $Product->gambar_detail = $gallery_images;
        $Product->save();
        return redirect()->route('admin.product')->with('status', 'Product has been updated successfully!');
    }

    public function generateProductThumbnailImage($image, $imageName)
    {
        $destinationPaththumbnail = public_path('uploads/barang');
        $destinationPath = public_path('uploads/barang/detail');
        $img = Image::read($image->path());
        $img->cover(560, 690, 'center');
        $img->resize(560, 690, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath . '/' . $imageName);

        $img->resize(300, 300, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPaththumbnail . '/' . $imageName);
    }

    public function ShowOrder()
    {

        $order = Order::orderBy('created_at', 'DESC')->paginate(10);
        $prosesOrders = Order::where('status', 'dipesan')->count();
        $berhasilOrders = Order::where('status', 'terkirim')->count();
        $batalOrders = Order::where('status', 'dibatalkan')->count();
        return view('admin.order', compact('order', 'prosesOrders', 'berhasilOrders', 'batalOrders'));
    }

    public function Order_detail($order_id)
    {
        $order = Order::find($order_id);
        $orderItems = OrderItem::where('order_id', $order_id)->orderBy('id')->paginate(10);
        $transaksi = Transaksi::where('order_id', $order_id)->first();
        return view('admin.order-details', compact('order', 'orderItems', 'transaksi'));
    }

    public function update_order_status(Request $request)
    {
        $order = Order::find($request->order_id);
        $order->status = $request->order_status;
        if ($request->order_status == 'terkirim') {
            $order->tanggal_dikirim = Carbon::now();
        } else if ($request->order_status == 'dibatalkan') {
            $order->tanggal_dibatalkan = Carbon::now();
        }
        $order->save();
        if ($request->order_status == 'terkirim') {
            $transaction = Transaksi::where('order_id', $request->order_id)->first();
            $transaction->status = "disetujui";
            $transaction->save();
        }
        return back()->with("status", "Status changed successfully!");
    }

    public function export(Request $request)
    {
        $bulan = $request->input('bulan'); // e.g. 1 = Januari

        return Excel::download(new UsersExport($bulan), 'orders-bulan-' . $bulan . '.xlsx');
        // return Excel::download(new UsersExport, 'users.xlsx');
    }
    public function exportLaporan(Request $request)
    {
        $bulan = $request->input('bulan'); // e.g. 1 = Januari
        $tahun = $request->input('tahun'); // e.g. 1 = Januari

        return Excel::download(new LaporanExport($bulan,$tahun), 'orders-bulan-' . $bulan . '-'.$tahun. '.xlsx');
        // return Excel::download(new UsersExport, 'users.xlsx');
    }

    public function cetak(){
        return view('admin.cetak');
    }
}
