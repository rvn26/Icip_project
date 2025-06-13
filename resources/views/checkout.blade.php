<x-app-layout>
    @section('styles')
        <link
            href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
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
            <h2 class="page-title">Checkout</h2>
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
                <a href="order-confirmation.html" class="checkout-steps__item">
                    <span class="checkout-steps__item-number">03</span>
                    <span class="checkout-steps__item-title">
                        <span>Confirmation</span>
                        <em>Review And Submit Your Order</em>
                    </span>
                </a>
            </div> --}}
            <form name="checkout-form" action="{{ route('cart.place.order') }}" method="POST">
                @csrf
                <div class="checkout-form">
                    <div class="billing-info__wrapper">
                        {{-- <div class="row">
                            <div class="col-6">
                                <h4>SHIPPING DETAILS</h4>
                            </div>
                            <div class="col-6">
                            </div>
                        </div> --}}

                        {{-- <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">

                            <div class="form-floating my-3">
                                <input type="text" class="form-control" name="name" required="">
                                <label for="name">Full Name *</label>
                                <span class="text-danger"></span>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1" for="firstName">
                                    First Name
                                </label>
                                <input
                                    class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange1"
                                    id="firstName" name="firstName" required="" type="text" />
                            </div>
                            <div class="sm:col-span-2">
                                <label class="block text-sm font-medium text-gray-700 mb-1" for="email">
                                    Email Address
                                </label>
                                <input
                                    class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange1"
                                    id="email" name="email" required="" type="email" />
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating my-3">
                                    <label class="block text-sm font-medium text-gray-700 mb-1" for="email">Phone Number
                                        *</label>
                                    <input
                                        class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange1"
                                        id="email" name="email" required="" type="email" />
                                    <input type="text" class="form-control" name="phone" required="">
                                    <span class="text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating my-3">
                                    <input type="text" class="form-control" name="zip" required="">
                                    <label for="zip">Pincode *</label>
                                    <span class="text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating mt-3 mb-3">
                                    <input type="text" class="form-control" name="state" required="">
                                    <label for="state">State *</label>
                                    <span class="text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating my-3">
                                    <input type="text" class="form-control" name="city" required="">
                                    <label for="city">Town / City *</label>
                                    <span class="text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating my-3">
                                    <input type="text" class="form-control" name="address" required="">
                                    <label for="address">House no, Building Name *</label>
                                    <span class="text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating my-3">
                                    <input type="text" class="form-control" name="locality" required="">
                                    <label for="locality">Road Name, Area, Colony *</label>
                                    <span class="text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating my-3">
                                    <input type="text" class="form-control" name="landmark" required="">
                                    <label for="landmark">Landmark *</label>
                                    <span class="text-danger"></span>
                                </div>
                            </div>
                        </div> --}}
                        @if ($alamat)
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="my-account__address-list">
                                        <div class="my-account__address-list-item">
                                            <div class="my-account__address-item__detail font-semibold ">
                                                <p>{{ $alamat->nama }}</p>
                                                <p>{{ $alamat->alamat }}</p>
                                                <p>{{ $alamat->patokan }}</p>
                                                <p>{{ $alamat->kota }}, {{ $alamat->provinsi }}</p>
                                                <p>{{ $alamat->nomer }}</p>
                                            </div>
                                            <div class="my-account__address-item__action mt-3">
                                                <a href="{{ route('alamat.edit',['id'=>$alamat->id]) }}" class="btn bg-orange3 text-white rounded-lg font-semibold">
                                                    Ubah Alamat
                                                </a>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <section class="md:col-span-2 bg-white p-5 rounded-lg shadow">
                                <h2 class="text-xl font-semibold text-gray-800 mb-6">
                                    Alamat lengkap
                                </h2>
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-2">
                                    <div class="sm:col-span-2">
                                        <label class="block text-sm font-medium text-gray-700 mb-1" for="nama">
                                            nama*
                                        </label>
                                        <input
                                            class="w-full border border-black rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange1"
                                            id="nama" name="nama" required="" type="text" value="{{ old('nama') }}" />
                                        @error('nama')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                    {{-- <div class="sm:col-span-2">
                                        <label class="block text-sm font-medium text-gray-700 mb-1" for="email">
                                            Email Address
                                        </label>
                                        <input
                                            class="w-full border border-black rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange1"
                                            id="email" name="email" required="" type="email" />
                                    </div> --}}
                                    <div class="sm:col-span-2">
                                        <label class="block text-sm font-medium text-gray-700 mb-1" for="nomer">
                                            No.telpon*
                                        </label>
                                        <input
                                            class="w-full border border-black rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange1"
                                            id="nomer" name="nomer" required="" type="tel" value="{{ old('nomer') }}" />
                                        @error('nomer')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                    <div class="sm:col-span-2">
                                        <label class="block text-sm font-medium text-gray-700 mb-1" for="alamat">
                                            Alamat*
                                        </label>
                                        <input
                                            class="w-full border border-black rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange1"
                                            id="alamat" name="alamat" placeholder="Masukan alamat lengkap" required=""
                                            type="text" value="{{ old('alamat') }}" />
                                        @error('alamat')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1" for="kota">
                                            kota*
                                        </label>
                                        <input
                                            class="w-full border border-black rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange1"
                                            id="kota" name="kota" required="" type="text" value="{{ old('kota') }}" />
                                        @error('kota')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1" for="provinsi">
                                            provinsi*
                                        </label>
                                        <input
                                            class="w-full border border-black rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange1"
                                            id="provinsi" name="provinsi" required="" type="text"
                                            value="{{ old('provinsi') }}" />
                                        @error('provinsi')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                    <div class="sm:col-span-2">
                                        <label class="block text-sm font-medium text-gray-700 mb-1" for="patokan">
                                            Patokan/Tanda lokasi*
                                        </label>
                                        <input
                                            class="w-full border border-black rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange1"
                                            id="patokan" name="patokan" placeholder="masukan petanda lokasi" required=""
                                            type="text" value="{{ old('patokan') }}" />
                                        @error('patokan')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                    <div class="sm:col-span-2">
                                        <label>
                                            <input type="checkbox" class="form-check-label" name="isdefault" value="1">
                                            Jadikan sebagai alamat utama
                                        </label>

                                    </div>
                                </div>
                                {{-- <h2 class="text-xl font-semibold text-gray-800 mt-10 mb-6">
                                    Payment Information
                                </h2> --}}
                                {{-- <div class="space-y-6">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1" for="cardName">
                                            Name on Card
                                        </label>
                                        <input
                                            class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange1"
                                            id="cardName" name="cardName" required="" type="text" />
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1" for="cardNumber">
                                            Card Number
                                        </label>
                                        <input
                                            class="w-full border border-gray-300 rounded-md px-3 py-2 tracking-widest focus:outline-none focus:ring-2 focus:ring-orange1"
                                            id="cardNumber" inputmode="numeric" maxlength="19" name="cardNumber"
                                            pattern="[0-9\s]{13,19}" placeholder="1234 5678 9012 3456" required=""
                                            type="text" />
                                    </div>
                                    <div class="grid grid-cols-2 gap-6">
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1" for="expDate">
                                                Expiration Date
                                            </label>
                                            <input
                                                class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange1"
                                                id="expDate" name="expDate" pattern="(0[1-9]|1[0-2])\/?([0-9]{2})"
                                                placeholder="MM/YY" required="" type="text" />
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1" for="cvv">
                                                CVV
                                            </label>
                                            <input
                                                class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange1"
                                                id="cvv" maxlength="4" name="cvv" pattern="[0-9]{3,4}" required=""
                                                type="password" />
                                        </div>
                                    </div>
                                </div> --}}
                            </section>
                        @endif
                    </div>

                    {{-- datail pesanan --}}
                    <div class="checkout__totals-wrapper ">
                        <div class="sticky-content ">

                            <div class="checkout__totals font-poppin font-semibold rounded-lg">
                                <h3>Pesanan Kamu</h3>
                                <table class="checkout-cart-items ">
                                    <thead>
                                        <tr>
                                            <th>PRODUK</th>
                                            <th align="right">SUBTOTAL</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $total = 0; 
                                        @endphp
                                        {{-- @if(session('cart')) --}}

                                        @foreach (session('cart') as $key => $detail)
                                            @php
                                                $total = $total + ($detail['harga'] * $detail['quantity']); 
                                            @endphp
                                            <tr>
                                                <td>
                                                    {{ $detail['nama'] }} x {{ $detail['quantity'] }}
                                                </td>
                                                <td align="right">
                                                    {{ 'Rp' . number_format($detail['harga'] * $detail['quantity'], 0, ',', '.') }}
                                                </td>
                                            </tr>
                                        @endforeach
                                        {{-- @endif --}}
                                    </tbody>
                                </table>
                                <table class="checkout-totals">
                                    <tbody>
                                        {{-- <tr>
                                            <th>SUBTOTAL</th>
                                            <td align="right">$62.40</td>
                                        </tr>
                                        <tr>
                                            <th>SHIPPING</th>
                                            <td align="right">Free shipping</td>
                                        </tr>
                                        <tr>
                                            <th>VAT</th>
                                            <td align="right">$19</td>
                                        </tr> --}}
                                        <tr>
                                            <th>TOTAL</th>
                                            <td align="right">{{ 'Rp' . number_format($total, 0, ',', '.') }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="checkout__payment-methods rounded-lg">
                                <div class="form-check">
                                    <input class="form-check-input form-check-input_fill" type="radio" name="mode"
                                        id="mode2" checked value="transfer">
                                    <label class="form-check-label" for="mode_1">
                                        Transfer
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input form-check-input_fill" type="radio" name="mode"
                                        id="mode1" value="cod">
                                    <label class="form-check-label" for="mode1">
                                        Cash on delivery
                                    </label>
                                </div>
                                <button class="btn btn bg-orange3 text-white rounded-lg font-semibold btn-checkout">PLACE ORDER</button>
                                {{-- <div class="policy-text">
                                    Your personal data will be used to process your order, support your experience
                                    throughout this
                                    website, and for other purposes described in our <a href="terms.html"
                                        target="_blank">privacy
                                        policy</a>.
                                </div> --}}
                            </div>

                        </div>
                    </div>

                </div>
            </form>
        </section>
    </main>

    @if(isset($snapToken))
        <script src="https://app.sandbox.midtrans.com/snap/snap.js"
            data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
        <script type="text/javascript">

            window.onload = function (e) {
                snap.pay('{{ $snapToken }}', {
                    onSuccess: function (result) {
                        // Redirect setelah sukses

                        window.location.href = "{{ route('cart.confirmation') }}";
                    },
                    onPending: function (result) {
                        // Redirect juga jika pending
                        window.location.href = "{{ route('riwayat.order') }}";
                    },
                    onError: function (result) {
                        alert("Pembayaran gagal. Silakan coba lagi.");
                        window.location.href = "{{ route('cart') }}";
                    }
                });
            };
        </script>
    @endif
</x-app-layout>