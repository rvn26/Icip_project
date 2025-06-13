<?php

namespace App\Http\Controllers;

use App\Models\Alamat;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Transaksi;
// use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Midtrans\Snap;
use Midtrans\Config;
use Surfsidemedia\Shoppingcart\Facades\Cart;

class Cartbarucontroller extends Controller
{
    public function addCart($id, request $request)
    {
        $product = Product::find($id);
        $cart = session('cart', []);
        $quantity = $request->input('quantity', 1);

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] = $cart[$id]['quantity'] + 1;
            $cart[$id]['quantity'] += $quantity;
        } else {
            $cart[$id] = [
                "nama" => $product->nama,
                "quantity" => $quantity,
                "harga" => $product->harga,
                "gambar" => $product->gambar,
            ];
        }

        session()->put("cart", $cart);
        return redirect()->back()->with("success", "Produk berhasil ditambahkan ke keranjang");
    }


    // public function addCart($id, Request $request)
    // {
    //     $product = Product::find($id);
    //     $cart = session('cart', []);

    //     if (isset($cart[$id])) {
    //         $cart[$id]['quantity']++;
    //     } else {
    //         $cart[$id] = [
    //             "nama" => $product->nama,
    //             "quantity" => 1,
    //             "harga" => $product->harga,
    //             "gambar" => $product->gambar,
    //         ];
    //     }

    //     session()->put("cart", $cart);

    //     if ($request->ajax()) {
    //         // return response()->json(['status' => 'success', 'message' => 'Produk berhasil ditambahkan ke keranjang']);
    //         $totalItems = array_sum(array_column(session('cart', []), 'quantity'));

    //         return response()->json([
    //             'status' => 'success',
    //             'message' => 'Produk berhasil ditambahkan ke keranjang',
    //             'totalItems' => $totalItems
    //         ]);
    //     }

    //     return redirect()->back()->with("success", "Produk berhasil ditambahkan ke keranjang");
    // }


    public function cart()
    {
        return view('cart_baru');
    }

    public function update(Request $request)
    {
        $cart = session()->get('cart');

        if (isset($cart[$request->id])) {
            if ($request->action === 'increase') {
                $cart[$request->id]['quantity']++;
            } elseif ($request->action === 'decrease' && $cart[$request->id]['quantity'] > 1) {
                $cart[$request->id]['quantity']--;
            }
            session()->put('cart', $cart);
            // dd($cart);
        }

        return response()->json([
            'success' => true,
            'cart' => $cart
        ]);
    }

    public function remove(Request $request)
    {
        $cart = session()->get('cart');

        if (isset($cart[$request->id])) {
            unset($cart[$request->id]);
            session()->put('cart', $cart);
        }
        // dd( session()->put('cart', $cart));
        return response()->json(['success' => true]);
    }

    public function checkout()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $alamat = Alamat::where('user_id', Auth::user()->id)->where('isdefault', 1)->first();
        return view('checkout', compact('alamat'));
    }

    public function place_order(request $request)
    {
        $user_id = Auth::user()->id;
        $alamat = Alamat::where('user_id', Auth::user()->id)->where('isdefault', true)->first();

        if (!$alamat) {
            $request->validate([
                'nama' => 'required|max:100',
                'nomer' => 'required|numeric',
                'provinsi' => 'required',
                'kota' => 'required',
                'alamat' => 'required',
                'patokan' => 'required',
            ]);
            $alamat = new Alamat();
            $alamat->nama = $request->nama;
            $alamat->nomer = $request->nomer;
            $alamat->provinsi = $request->provinsi;
            $alamat->kota = $request->kota;
            $alamat->alamat = $request->alamat;
            $alamat->patokan = $request->patokan;
            $alamat->user_id = $user_id;
            $alamat->isdefault = $request->has('isdefault');
            $alamat->save();
        }
        $result = $this->setAmountForCheckout();
        if ($result instanceof \Illuminate\Http\RedirectResponse) {
            return $result;
        }
        $order = new Order();
        $order->user_id = $user_id;
        $checkout = session()->get('checkout', []);
        $order->subtotal = $checkout['subtotal'] ?? 0;
        $order->total = $checkout['total'] ?? 0;
        $order->nama = $alamat->nama;
        $order->nomer = $alamat->nomer;
        $order->alamat = $alamat->alamat;
        $order->kota = $alamat->kota;
        $order->provinsi = $alamat->provinsi;
        $order->patokan = $alamat->patokan;
        $order->save();
        foreach (session('cart') as $id => $item) {
            $orderItem = new OrderItem();
            $orderItem->product_id = $id;
            $orderItem->order_id = $order->id;
            $orderItem->harga = $item['harga'];
            $orderItem->quantity = $item['quantity'];
            $orderItem->save();
        }

        if ($request->mode == "transfer") {
            Config::$serverKey = config('midtrans.serverKey');
            Config::$isProduction = config('midtrans.isProduction');
            Config::$isSanitized = true;
            Config::$is3ds = true;
            $payload = [
                'transaction_details' => [
                    'order_id' => $order->id . '-' . time(),
                    'gross_amount' => $order->total,
                ],
                'customer_details' => [
                    'name' => Auth::user()->name,
                    'phone' => $order->nomer,
                    'email' => Auth::user()->email ?? 'customer@mail.com',
                ],
                'item_details' => [],
            ];

            foreach (session('cart') as $id => $item) {
                $payload['item_details'][] = [
                    'id' => $id,
                    'price' => $item['harga'],
                    'quantity' => $item['quantity'],
                    'name' => 'Product-' . $id, // Bisa diganti dengan nama produk
                ];
            }
            $snapToken = Snap::getSnapToken($payload);
            $transaction = new Transaksi();
            $transaction->user_id = $user_id;
            $transaction->order_id = $order->id;
            $transaction->mode = $request->mode;
            $transaction->status = "menunggu";
            $transaction->snap_token = $snapToken;
            $transaction->save();
            session::put('order_id', $order->id);
            return view('checkout', compact('snapToken', 'alamat'));
        } elseif ($request->mode == "cod") {
            $transaction = new Transaksi();
            $transaction->user_id = $user_id;
            $transaction->order_id = $order->id;
            $transaction->mode = $request->mode;
            $transaction->snap_token = null;
            $transaction->status = "menunggu";
            $transaction->save();
        }
        session()->forget('cart');
        session()->forget('checkout');
        session::put('order_id', $order->id);
        return redirect()->route('cart.confirmation');
    }

    public function edit_alamat($id)
    {
        $alamat = Alamat::findOrFail($id);
        return view('ubah-alamat', compact('alamat'));
    }

    public function update_alamat(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'nomer' => 'required',
            'provinsi' => 'required',
            'kota' => 'required',
            'alamat' => 'required',
            'patokan' => 'nullable',
        ]);

        $alamat = Alamat::findOrFail($id);

        $alamat->nama = $request->nama;
        $alamat->nomer = $request->nomer;
        $alamat->provinsi = $request->provinsi;
        $alamat->kota = $request->kota;
        $alamat->alamat = $request->alamat;
        $alamat->patokan = $request->patokan;

        if ($request->has('isdefault')) {
            // Set semua alamat user ke false
            Alamat::where('user_id', $alamat->user_id)->update(['isdefault' => false]);
            $alamat->isdefault = true;
        } else {
            $alamat->isdefault = false;
        }

        $alamat->save();

        return redirect()->route('cart.checkout')->with('success', 'Alamat berhasil diperbarui.');
    }


    public function setAmountForCheckout()
    {
        $cart = session('cart', []);
        if (empty($cart)) {
            session()->forget('checkout');
            return redirect()->back()->with('error', 'Keranjang kosong. Tidak dapat melanjutkan pemesanan.');
        }

        $subtotal = 0;
        foreach ($cart as $item) {
            $subtotal += $item['harga'] * $item['quantity'];
        }

        // $tax = $subtotal * 0.11; // misal pajak 11%
        $total = $subtotal;

        session()->put('checkout', [
            'subtotal' => $subtotal,
            'total' => $total
        ]);
    }

    public function confirmation()
    {
        if (Session::has('order_id')) {
            session()->forget('cart');
            session()->forget('checkout');
            $order = Order::find(Session::get('order_id'));
            return view('order-confirmation', compact('order'));
        }

        return redirect()->route('cart');
    }

    public function remove_cart()
    {
        session()->forget('cart');
        session()->forget('checkout');
    }

    public function handleMidtransCallback(Request $request)
    {
        $serverKey = config('midtrans.serverKey'); // Ambil dari config

        $data = $request->all();

        // Hitung signature_key berdasarkan dokumentasi Midtrans
        $expectedSignature = hash(
            'sha512',
            $data['order_id'] .
                $data['status_code'] .
                $data['gross_amount'] .
                $serverKey
        );

        if ($data['signature_key'] !== $expectedSignature) {
            return response()->json(['message' => 'Invalid signature'], 403);
        }

        // Proses status transaksi setelah valid
        $orderId = explode('-', $data['order_id'])[0];
        $transaksi = Transaksi::where('order_id', $orderId)->first();

        if (!$transaksi) {
            return response()->json(['message' => 'Transaksi tidak ditemukan'], 404);
        }

        $transactionStatus = $data['transaction_status'];

        if ($transactionStatus === 'settlement') {
            $transaksi->status = 'disetujui';
        } elseif ($transactionStatus === 'pending') {
            $transaksi->status = 'menunggu';
        } elseif (in_array($transactionStatus, ['deny', 'cancel', 'expire'])) {
            $transaksi->status = 'ditolak';
        }

        $transaksi->save();

        return response()->json(['message' => 'Notifikasi berhasil diproses']);
    }
}
