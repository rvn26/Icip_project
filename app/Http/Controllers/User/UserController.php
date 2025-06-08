<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Transaksi;
use Barryvdh\DomPDF\Facade\Pdf ;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $product = Product::all();
        return view('dashboard', compact('product'));
    }

    public function viewshop()
    {
        $product = Product::all();
        return view('Shop', compact('product'));
    }

    public function shop_detail($id)
    {
        $product = Product::find($id);
        $products = Product::all();
        return view('detail', compact('product', 'products'));
    }

    public function viewshop2()
    {
        $product = Product::all();
        return view('Map', compact('product'));
    }

    public function ShowOrder()
    {
        $user_id = Auth::user()->id;
        $order = Order::where('user_id', $user_id)->with(['orderItems', 'transaksi'])
            ->orderBy('created_at', 'DESC')
            ->paginate(6);

        return view('riwayat_order', compact('order'));
    }


    public function invoice($order_id){
        $order = Order::find($order_id);
        $orderItems = OrderItem::where('order_id', $order_id)->orderBy('id')->paginate(10);
        $transaksi = Transaksi::where('order_id', $order_id)->first();
        return view('invoice',compact('order','orderItems','transaksi'));
    }

     public function cetak_pdf($order_id)
    {
    	$order = Order::find($order_id);
        $orderItems = OrderItem::where('order_id', $order_id)->orderBy('id')->paginate(10);
        $transaksi = Transaksi::where('order_id', $order_id)->first();
        $tanggal = $order->created_at->format('Y-m-d');
    	$pdf = Pdf::loadview('invoice',compact('order','orderItems','transaksi'))->setPaper('A4', 'portrait');
    	return $pdf->download('invoice-'.$order->id.'-'. $tanggal .'.pdf');
    }
}
