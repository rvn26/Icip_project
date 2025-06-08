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
    <main class="mt-16 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
            <div>
                <img alt="{{ $product->nama }}"
                    class="w-full rounded-lg object-cover" height="600" id="mainImage"
                    src="{{ asset('uploads/barang/original') }}/{{ $product->gambar }}" width="600" />
                <div class="sm:hidden mt-4 grid grid-cols-4 gap-4">
                    @php

                    @endphp
                    @foreach (explode(',', $product->gambar_detail) as $img)

                        <img alt="Side view of modern wireless headphones showing sleek design and controls"
                            class="thumbnail-image w-full rounded-lg object-cover cursor-pointer border-2 border-orange3" height="150"
                            id="thumb{{ $loop->iteration }}" src="{{ asset('uploads/barang/detail')}}/{{ trim($img) }}"
                            width="150" />
                    @endforeach

                </div>
            </div>
            <div class="flex flex-col  justify-between">
                <div>
                    <form action="{{ route('cart.add', $product->id) }}" method="GET">
                        @csrf
                        <h1 class="text-3xl font-semibold text-gray-900 font-poppins">
                            {{ $product->nama }}
                        </h1>
                        <p class="mt-2 text-balck text-2xl font-bold">
                            {{ 'Rp' . number_format($product->harga, 0, ',', '.') }}
                        </p>

                        <p class="mt-6 text-gray-700 leading-relaxed">
                            {{$product->deskripsi}}
                        </p>


                        <div class="mt-6 ">
                            <label class="block text-sm font-medium text-gray-700 mb-1" for="quantity">
                                Quantity
                            </label>
                            <button aria-label="Decrease quantity" type="button"
                                class="px-3 py-1 border border-gray-300 rounded-l-md text-gray-700 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-orange3"
                                id="decreaseQty">
                                <i class="fas fa-minus">
                                </i>
                            </button>
                            <input type="text" id="quantityInput" value="1"
                                class="w-16 text-center border-t border-b border-gray-300 focus:outline-none"
                                readonly />
                            <input type="hidden" name="quantity" id="quantity" value="1" />
                            <button aria-label="Increase quantity" type="button"
                                class="px-3 py-1 border border-gray-300 rounded-r-md text-gray-700 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-orange3"
                                id="increaseQty">
                                <i class="fas fa-plus">
                                </i>
                            </button>
                        </div>
                        <div class="mt-6">

                            <button
                                class="flex-1 bg-orange3 text-white font-semibold rounded-md px-6 py-3 hover:bg-orange2 focus:outline-none focus:ring-2 focus:ring-orange3 focus:ring-offset-2">
                                <i class="fas fa-shopping-cart mr-2"> </i>
                                Add to Cart
                            </button>
                        </div>
                        <div class="hidden mt-4 sm:grid grid-cols-4 gap-4">
                    @php

                    @endphp
                    @foreach (explode(',', $product->gambar_detail) as $img)

                        <img alt="Side view of modern wireless headphones showing sleek design and controls"
                            class=" thumbnail-image w-full rounded-lg object-cover cursor-pointer border-2 border-orange3" height="150"
                            id="thumbm{{ $loop->iteration }}" src="{{ asset('uploads/barang/detail')}}/{{ trim($img) }}"
                            width="150" />
                    @endforeach

                </div>
                    </form>
                </div>
                {{-- <div class="mt-8 flex flex-col sm:flex-row sm:space-x-4 space-y-4 sm:space-y-0">
                    <button
                        class="flex-1 bg-indigo-600 text-white font-semibold rounded-md px-6 py-3 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:ring-offset-2"
                        type="button">
                        <i class="fas fa-shopping-cart mr-2"> </i>
                        Add to Cart
                    </button>
                    <button
                        class="flex-1 border border-indigo-600 text-indigo-600 font-semibold rounded-md px-6 py-3 hover:bg-indigo-50 focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:ring-offset-2"
                        type="button">
                        <i class="fas fa-heart mr-2"> </i>
                        Add to Wishlist
                    </button>
                </div> --}}
            </div>
        </div>

        <section class="mt-16">
            <h2 class="text-2xl font-semibold text-gray-900 mb-6">
                Related Products
            </h2>
            <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                @foreach ($products as $barang)

                    <article class="bg-white rounded-lg shadow-md hover:shadow-2xl p-4 transition flex flex-col">
                        <a href="{{ route('shop.detail', ['id' => $barang->id]) }}">
                            <div class="swiper-container rounded-t-lg w-full aspect-auto">
                                <div class="swiper-wrapper">
                                    @foreach (explode(',', $barang->gambar_detail) as $img)
                                        <div class="swiper-slide">
                                            <img src="{{ asset('uploads/barang/detail')}}/{{ trim($img) }} "
                                                alt="Gambar {{ $barang->nama }}" class="w-full object-cover h-full" />
                                        </div>
                                    @endforeach
                                </div>
                                <div class="swiper-pagination"></div>
                            </div>
                            <div class="p-2 flex flex-col flex-grow">
                                <h3 class="text-lg font-semibold text-gray-900 mb-2">
                                    {{ $barang->nama }}
                                </h3>
                                <p class="text-gray-600 flex-grow">
                                    {{ $barang->deskripsi }}
                                </p>
                                <div
                                    class="mt-3 flex items-center justify-between flex-col sm:flex-row sm:items-center sm:justify-between gap-2">
                                    <span class="text-lg sm:text-xl font-bold text-balck">
                                        {{ 'Rp' . number_format($barang->harga, 0, ',', '.') }} </span>
                                    <a href="{{ route('cart.add', ['id' => $barang->id]) }}"
                                        class="bg-orange3 text-white sm:px-4 px-3 py-2 text-center rounded-md hover:bg-orange2 transition text-sm">
                                        Add to Cart
                                    </a>
                                </div>
                            </div>
                        </a>
                    </article>
                    {{-- <article class="bg-white rounded-lg shadow p-4 flex flex-col">
                        <div class="swiper-container rounded-t-lg w-full aspect-auto">
                            <div class="swiper-wrapper">
                                @foreach (explode(',', $barang->gambar_detail) as $img)
                                <div class="swiper-slide">
                                    <img src="{{ asset('uploads/barang/detail')}}/{{ trim($img) }} "
                                        alt="Gambar {{ $barang->nama }}" class="w-full h-48 object-cover rounded-md"
                                        height="300" />
                                </div>
                                @endforeach
                            </div>
                            <h3 class="mt-4 text-gray-900 font-semibold text-lg">
                                Wireless Earbuds
                            </h3>
                            <p class="mt-1 text-indigo-600 font-bold">$99.99</p>
                            <button
                                class="mt-auto bg-indigo-600 text-white rounded-md py-2 px-4 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:ring-offset-2">
                                View Product
                            </button>
                    </article> --}}
                @endforeach
            </div>

        </section>
    </main>

    <script>

        const decreaseBtn = document.getElementById('decreaseQty');
        const increaseBtn = document.getElementById('increaseQty');
        const quantityInput = document.getElementById('quantityInput');
        const quantity = document.getElementById('quantity');

        decreaseBtn.addEventListener('click', () => {
            let current = parseInt(quantityInput.value);
            let current1 = parseInt(quantity.value);
            if (current > 1) {
                quantityInput.value = current - 1;
                quantity.value = current1 - 1;
            }
        });

        increaseBtn.addEventListener('click', () => {
            let current = parseInt(quantityInput.value);
            let current1 = parseInt(quantity.value);
            quantityInput.value = current + 1;
            quantity.value = current1 + 1;
        });
        quantityInput.addEventListener('input', () => {
            if (quantityInput.value === '' || parseInt(quantityInput.value) < 1) {
                quantityInput.value = 1;
            }
            formQuantity.value = quantityInput.value;
        });
        quantity.addEventListener('input', () => {
            if (quantity.value === '' || parseInt(quantity.value) < 1) {
                quantity.value = 1;
            }
            formQuantity.value = quantity.value;
        });

        // desc
        const mainImage = document.getElementById("mainImage");
        const thumbnail = document.querySelectorAll('.thumbnail-image');
        const thumbnails = [
            document.getElementById("thumb1"),
            document.getElementById("thumb2"),
            document.getElementById("thumb3"),
            document.getElementById("thumb4"),
        ];

        thumbnail.forEach((thumb) => {
            thumb.addEventListener("click", () => {
                // Update main image src and alt
                mainImage.src = thumb.src;
                mainImage.alt = thumb.alt;

                // Remove border-indigo-600 from all thumbnails
                thumbnails.forEach((t) => {
                    t.classList.remove("border-orange3");
                    t.classList.add("border-transparent");
                });

                // Add border-indigo-600 to clicked thumbnail
                thumb.classList.add("border-orange3");
                thumb.classList.remove("border-transparent");
            });
        });

        // mobile
        // const mainImage = document.getElementById("mainImage");
        // const thumbnails = [
        //     document.getElementById("thumbm1"),
        //     document.getElementById("thumbm2"),
        //     document.getElementById("thumbm3"),
        //     document.getElementById("thumbm4"),
        // ];

        // thumbnails.forEach((thumbm) => {
        //     thumb.addEventListener("click", () => {
        //         // Update main image src and alt
        //         mainImage.src = thumbm.src;
        //         mainImage.alt = thumbm.alt;

        //         // Remove border-indigo-600 from all thumbnails
        //         thumbnails.forEach((t) => {
        //             t.classList.remove("border-orange3");
        //             t.classList.add("border-transparent");
        //         });

        //         // Add border-indigo-600 to clicked thumbnail
        //         thumb.classList.add("border-orange3");
        //         thumb.classList.remove("border-transparent");
        //     });
        // });

    </script>

</x-app-layout>