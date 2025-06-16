<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Intervention\Image\Laravel\Facades\Image;

class KasirController extends Controller
{
    public function index(){
        
        return view('kasir.dashboard');
    }

    public function Product()
    {
        $product = Product::orderBy('id', 'ASC')->paginate(10);
        return view('kasir.product', compact('product'));
    }

    public function tambahproduct()
    {
        return view('kasir.tambah_product');
    }

    public function editproduct($id)
    {
        $product = Product::find($id);
        return view('kasir.edit-product', compact('product'));
    }

    public function  hapusproduct($id)
    {
        $product = Product::find($id);
        if (File::exists(public_path('uploads/barang') . '/' . $product->gambar)) {
            File::delete(public_path('uploads/barang') . '/' . $product->gambar);
        }
        $product->delete();
        return redirect()->route('kasir.product')->with('status', 'Produk berhasil dihapus');
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
        return redirect()->route('kasir.product')->with('status', 'Product has been added successfully!');
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
            if (FilE::exists(public_path('uploads/barang') . '/' . $Product->gambar)) {
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
        return redirect()->route('kasir.product')->with('status', 'Product has been updated successfully!');
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
        return view('kasir.order', compact('order', 'prosesOrders', 'berhasilOrders', 'batalOrders'));
    }

    public function Order_detail($order_id)
    {
        $order = Order::find($order_id);
        $orderItems = OrderItem::where('order_id', $order_id)->orderBy('id')->paginate(10);
        $transaksi = Transaksi::where('order_id', $order_id)->first();
        return view('kasir.order-details', compact('order', 'orderItems', 'transaksi'));
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

      public function update_transaksi_status(Request $request)
    {
        $transaksi = Transaksi::where('order_id', $request->order_id)->first();
        
        $transaksi->status = $request->transaksi_status;
       
        if ($request->transaksi_status == 'Dibayar') {
            $transaksi->status = "disetujui";
        }else if($request->transaksi_status == 'Ditolak'){
            $transaksi->status = "ditolak";
        }
        
        $transaksi->save();
        return back()->with("status", "Status changed successfully!");
    }

}
