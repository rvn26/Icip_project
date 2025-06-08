<x-app-layout>
    @section('styles')
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
      rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Allura&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('asset/css/plugins/swiper') }}.min.css" type="text/css" />
    <link rel="stylesheet" href="{{ asset('asset/css/style.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('asset/css/custom.css') }}" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
      integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw=="
      crossorigin="anonymous" referrerpolicy="no-referrer">
    @endsection
    <main class="pt-90">
        <div class="mb-4 pb-4"></div>
        <section class="shop-checkout container">
            {{-- <h2 class="page-title">Order Received</h2> --}}
            {{-- <div class="checkout-steps">
                <a href="cart.html" class="checkout-steps__item active">
                    <span class="checkout-steps__item-number">01</span>
                    <span class="checkout-steps__item-title">
                        <span>Shopping Bag</span>
                        <em>Manage Your Items List</em>
                    </span>
                </a>
                <a href="checkout.html" class="checkout-steps__item active">
                    <span class="checkout-steps__item-number">02</span>
                    <span class="checkout-steps__item-title">
                        <span>Shipping and Checkout</span>
                        <em>Checkout Your Items List</em>
                    </span>
                </a>
                <a href="order-confirmation.html" class="checkout-steps__item active">
                    <span class="checkout-steps__item-number">03</span>
                    <span class="checkout-steps__item-title">
                        <span>Confirmation</span>
                        <em>Review And Submit Your Order</em>
                    </span>
                </a>
            </div> --}}

            <div class="order-complete">
                <div class="order-complete__message">
                    <svg width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="40" cy="40" r="40" fill="#4CAF50" />
                        <path
                            d="M52.9743 35.7612C52.9743 35.3426 52.8069 34.9241 52.5056 34.6228L50.2288 32.346C49.9275 32.0446 49.5089 31.8772 49.0904 31.8772C48.6719 31.8772 48.2533 32.0446 47.952 32.346L36.9699 43.3449L32.048 38.4062C31.7467 38.1049 31.3281 37.9375 30.9096 37.9375C30.4911 37.9375 30.0725 38.1049 29.7712 38.4062L27.4944 40.683C27.1931 40.9844 27.0257 41.4029 27.0257 41.8214C27.0257 42.24 27.1931 42.6585 27.4944 42.9598L33.5547 49.0201L35.8315 51.2969C36.1328 51.5982 36.5513 51.7656 36.9699 51.7656C37.3884 51.7656 37.8069 51.5982 38.1083 51.2969L40.385 49.0201L52.5056 36.8996C52.8069 36.5982 52.9743 36.1797 52.9743 35.7612Z"
                            fill="white" />
                    </svg>
                    <h3>Pesanan Kamu sudah berhasil!!</h3>
                    <p>Terimakasih sudah memesan di toko kami</p>
                </div>
                <div class="border-dashed border-gray-400 rounded-lg shadow-md p-6 w-full max-w-4xl mx-auto font-sans">
                    <!-- Desktop View -->
                    <div class="hidden md:grid grid-cols-4 text-center text-sm text-gray-500 font-semibold mb-2">
                        <div>Nomer pesanan</div>
                        <div>Tanggal</div>
                        <div>Total</div>
                        <div>Metode pembayaran</div>
                    </div>
                    <div class="hidden md:grid grid-cols-4 text-center text-base font-semibold text-black">
                        <div>{{ $order->id }}</div>
                        <div>{{ $order->created_at->timezone('Asia/Jakarta')->format('d-m-Y H:i') }}</div>
                        <div>{{ 'Rp' . number_format($order->total, 2, ',', '.') }}</div>
                        <div>{{ $order->transaksi->mode }}</div>
                    </div>
                
                    <!-- Mobile View -->
                    <div class="md:hidden flex flex-col space-y-4 text-sm text-gray-600">
                        <div class="flex justify-between">
                            <span class="text-gray-500 font-medium">Nomer pesanan</span>
                            <span class="text-black font-semibold">{{ $order->id }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-500 font-medium">Tanggal</span>
                            <span class="text-black font-semibold">{{ $order->created_at->timezone('Asia/Jakarta')->format('d-m-Y H:i') }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-500 font-medium">Total</span>
                            <span class="text-black font-semibold">{{ 'Rp' . number_format($order->total, 2, ',', '.') }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-500 font-medium">Metode pembayaran</span>
                            <span class="text-black font-semibold">{{ $order->transaksi->mode }}</span>
                        </div>
                    </div>
                </div>
                
                {{-- <div class="border border-dashed border-gray-400 p-6 w-full max-w-4xl mx-auto font-sans">
                    <div class="grid grid-cols-4 text-center text-sm text-gray-500 font-semibold mb-2">
                        <div>Nomer pesanan</div>
                        <div>Tanggal</div>
                        <div>Total</div>
                        <div>Metode pembayaran</div>
                    </div>
                    <div class="grid grid-cols-4  text-center text-base font-semibold text-black">
                        <div>{{ $order->id }}</div>
                        <div>{{ $order->created_at->timezone('Asia/Jakarta')->format('d-m-Y H:i') }}</div>
                        <div>{{ $order->total }}</div>
                        <div>{{ $order->transaksi->mode}}</div>
                    </div>
                </div> --}}
                
                {{-- <div class="order-info">
                    <div class="order-info__item">
                        <label>Order Number</label>
                        <span>{{ $order->id }}</span>
                    </div>
                    <div class="order-info__item">
                        <label>Date</label>
                        <span>{{ $order->created_at->timezone('Asia/Jakarta')->format('d-m-Y H:i') }}</span>
                    </div>
                    <div class="order-info__item">
                        <label>Total</label>
                        <span>{{ $order->total }}</span>
                    </div>
                    <div class="order-info__item">
                        <label>Paymetn Method</label>
                        <span>{{ $order->transaksi->mode}}</span>
                    </div>
                </div> --}}
                <div class="checkout__totals-wrapper  sm:w-1/2 mx-auto">
                    <div class="checkout__totals  border-none shadow-md rounded-lg ">
                        <h3>Detail pesanan</h3>
                        <table class="checkout-cart-items">
                            <thead>
                                <tr>
                                    <th>Produk</th>
                                    <th>SUBTOTAL</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order->orderItems  as $items)
                                <tr>
                                    <td>
                                        {{ $items->product->nama }} x {{ $items->quantity}}
                                    </td>
                                    <td class="text-right">
                                        {{ 'Rp' . number_format($items->harga * $items->quantity, 2, ',', '.') }}
                                    </td>
                                </tr>
                                @endforeach
                                
                            </tbody>
                        </table>
                        <table class="checkout-totals">
                            <tbody>
                                <tr>
                                    <th>TOTAL</th>
                                    <td class="text-right">{{ 'Rp' . number_format($order->total, 2, ',', '.') }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                    <div class="flex justify-center">
                        <a class="inline-flex items-center bg-orange2 text-white px-4 py-2 rounded-md font-semibold text-lg hover:bg-orange3 transition w-fit"
                           href="{{ route('shop') }}">
                           kembali berbelanja
                        </a>
                    </div>
               
            </div>
            
        </section>
    </main>
</x-app-layout>