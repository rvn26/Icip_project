<?php

use App\Http\Controllers\Cartbarucontroller;
use App\Http\Controllers\Cartcontroller;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\AdminController;
use App\Http\Controllers\User\KasirController;
use App\Http\Controllers\User\UserController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use PHPUnit\Framework\Attributes\Group;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;

Route::get('/', function () {
    $product = Product::all();
    return view('welcome', compact('product'));
})->name('home');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/Kontak1', function () {
    $product = Product::all();
    return view('Kontak1', compact('product'));
})->name('kontak1');





Route::get('/Map', function () {
    return view('Map');
})->middleware(['auth', 'verified'])->name('Map');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

//user
Route::middleware(['auth', 'usermiddleware', 'verified'])->group(function () {
    Route::get('/dashboard', [UserController::class, 'index'])->name('dashboard');
    Route::get('/shop', [UserController::class, 'viewshop'])->name('shop');
    Route::get('/cart', [Cartbarucontroller::class, 'cart'])->name('cart');
    Route::get('/shop/detail/{id}', [UserController::class, 'shop_detail'])->name('shop.detail');
    Route::get('/riwayat-order', [UserController::class, 'ShowOrder'])->name('riwayat.order');
    Route::get('/invoice/{id}', [UserController::class, 'cetak_pdf'])->name('cetak.pdf');
    Route::get('/invoice_tampil/{id}', [UserController::class, 'invoice'])->name('invoice');
    // Route::post('/cart/add',[Cartcontroller::class,'addcart'])->name('cart.add');
    Route::get('/cart/add/{id}', [Cartbarucontroller::class, 'addCart'])->name('cart.add');
    Route::post('/cart/update', [Cartbarucontroller::class, 'update'])->name('cart.update');
    Route::post('/cart/remove', [Cartbarucontroller::class, 'remove'])->name('cart.remove');

    Route::get('/checkout', [Cartbarucontroller::class, 'checkout'])->name('cart.checkout');
    Route::post('/place-order', [Cartbarucontroller::class, 'place_order'])->name('cart.place.order');
    Route::get('/order-confirmation', [Cartbarucontroller::class, 'confirmation'])->name('cart.confirmation');
    Route::get('/alamat/{id}/edit', [CartbaruController::class, 'edit_alamat'])->name('alamat.edit');
    Route::put('/alamat/{id}', [Cartbarucontroller::class, 'update_alamat'])->name('alamat.update');


    Route::get('/contact', function () {
        return view('contact');
    })->middleware(['auth', 'verified'])->name('contact');
});

//admin
Route::middleware(['auth', 'adminmiddleware'])->group(function () {

    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/product', [AdminController::class, 'product'])->name('admin.product');
    Route::get('/admin/user', [AdminController::class, 'show_user'])->name('admin.user');
    Route::put('/admin/user/update', [AdminController::class, 'update_user'])->name('admin.user.update');
    Route::get('/admin/user/edit/{id}', [AdminController::class, 'edit_user'])->name('admin.user.edit');
    Route::get('/admin/product/tambah', [AdminController::class, 'tambahproduct'])->name('admin.tambahproduct');
    Route::post('/admin/product/simpan', [AdminController::class, 'storeProduct'])->name('admin.simpan.product');
    Route::get('/admin/product/edit/{id}', [AdminController::class, 'editproduct'])->name('admin.edit.product');
    Route::put('/admin/product/update', [AdminController::class, 'updateproduct'])->name('admin.update.product');
    Route::delete('/admin/product/hapus/{id}', [AdminController::class, 'hapusproduct'])->name('admin.hapus.product');
    Route::get('/admin/order', [AdminController::class, 'ShowOrder'])->name('admin.order');
    Route::get('/admin/order/{id}/details', [AdminController::class, 'Order_detail'])->name('admin.order.detail');
    Route::put('/admin/order/update-status', [AdminController::class, 'update_order_status'])->name('admin.order.status.update');
    Route::put('/admin/order/transaksi-status', [AdminController::class, 'update_transaksi_status'])->name('admin.transaksi.status.update');
    Route::get('/admin/exel', [AdminController::class, 'export'])->name('admin.exel');
    Route::get('/admin/Laporanexel', [AdminController::class, 'exportLaporan'])->name('admin.laporanexel');
    Route::get('/admin/cetak', [AdminController::class, 'cetak'])->name('admin.cetak');
});

Route::post('/midtrans/callback', [Cartbarucontroller::class, 'handleMidtransCallback'])->withoutMiddleware([VerifyCsrfToken::class]);

//kasir
Route::middleware(['auth', 'kasirmiddleware'])->group(function () {
    Route::get('/kasir/dashboard', [KasirController::class, 'index'])->name('kasir.dashboard');
    Route::get('/kasir/product', [kasirController::class, 'product'])->name('kasir.product');
    Route::get('/kasir/product/tambah', [kasirController::class, 'tambahproduct'])->name('kasir.tambahproduct');
    Route::post('/kasir/product/simpan', [kasirController::class, 'storeProduct'])->name('kasir.simpan.product');
    Route::get('/kasir/product/edit/{id}', [kasirController::class, 'editproduct'])->name('kasir.edit.product');
    Route::put('/kasir/product/update', [kasirController::class, 'updateproduct'])->name('kasir.update.product');
    Route::delete('/kasir/product/hapus/{id}', [kasirController::class, 'hapusproduct'])->name('kasir.hapus.product');
    Route::get('/kasir/order', [kasirController::class, 'ShowOrder'])->name('kasir.order');
    Route::get('/kasir/order/{id}/details', [kasirController::class, 'Order_detail'])->name('kasir.order.detail');
    Route::put('/kasir/order/update-status', [kasirController::class, 'update_order_status'])->name('kasir.order.status.update');
    Route::put('/kasir/order/transaksi-status', [KasirController::class, 'update_transaksi_status'])->name('kasir.transaksi.status.update');
});
