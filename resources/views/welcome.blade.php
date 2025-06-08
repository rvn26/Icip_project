<x-font-layout>
  <section class="bg-white w-screen h-screen  ">
      
    <div class="max-w-7xl min-h-screen mx-auto px-4 sm:px-6 lg:px-8 py-10 md:py-20 flex flex-col md:flex-row items-center gap-10">
        <div class="md:w-1/2 h-full space-y-6 bg-transparent p-5 rounded-3xl  w-full mt-10 flex items-center justify-center" >
          <div class=" h-full space-y-6 w-full ">
            <h1 class="text-4xl md:text-5xl font-extrabold text-black leading-tight font-poppins">
                Selamat Datang Di ICIP-ICIP
            </h1>
            <p class="text-gray-900 text-lg md:text-xl max-w-xl">
                Shop from a wide range of clothing, shoes, and accessories. Quality
                products at unbeatable prices. Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum eveniet, mollitia, quo dolorem vitae cupiditate dignissimos eligendi saepe sint eum explicabo. Debitis, ad. Quibusdam at quisquam voluptatem culpa qui fugiat.
            </p>
            <a class="inline-block mr-4 bg-orange2 border-2 text-cream px-6 py-3 rounded-md font-semibold text-lg border-orange2 hover:border-orange3 hover:bg-orange3 hover:text-cream transition"
                href="{{ route('shop') }}">
                Shop Now
            </a>
            <a class="inline-block bg-transparent border-2 border-orange3 text-orange3 px-6 py-3  rounded-md font-semibold text-lg hover:bg-orange3  hover:border-orange3 hover:text-cream transition"
                href="{{ route('contact') }}">
                Hubungi kami
            </a>
          </div>
        </div>
        <div class="md:w-1/2 mt-10 h-auto "> 
          <img alt="A stylish young woman wearing trendy fashion clothes posing in urban environment"
                class="rounded-lg w-max h-[650px]  mx-auto mr-0  shadow-black shadow-lg object-cover" height="400" src="{{ asset('img/DSCF7772.jpg') }}"
                width="600" />
        </div>
    </div>
</section>
    {{-- <section class="bg-cream w-screen h-screen  ">
      <div class="max-w-7xl h-screen mx-auto px-4 sm:px-6 lg:px-8 py-10  md:py-20 flex flex-col md:flex-row items-center gap-10">
          <div class="md:w-1/2 space-y-6 bg-transparent w-full mt-10 max-h-[700px]  p-6 rounded-2xl  overflow-y-auto">
              <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 leading-tight font-poppins">
                  Selamat Datang Di ICIP-ICIP
              </h1>
              <p class="text-gray-600 text-lg md:text-xl max-w-xl">
                  Shop from a wide range of clothing, shoes, and accessories. Quality
                  products at unbeatable prices.
              </p>
              <a class="inline-block bg-orange3 text-white px-6 py-3 rounded-md font-semibold text-lg hover:bg-orange2 transition"
                  href="{{ route('shop') }}">
                  Shop Now
              </a>
          </div>
          <div class="md:w-1/2 mt-10 h-full bg-gradient-to-b from-orange2 via-orange3 to-black p-5 rounded-3xl shadow-black shadow-lg">
              <img alt="A stylish young woman wearing trendy fashion clothes posing in urban environment"
                  class="rounded-lg shadow-lg w-full object-cover" height="400" src="{{ asset('img/Cuplikan layar 2025-05-07 102756.png') }}"
                  width="600" />
          </div>
      </div>
  </section> --}}
    {{-- <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12" id="products">
        <h2 class="text-3xl font-extrabold text-gray-900 mb-8 text-center">
          Produk Kami
        </h2>
        <div
          class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8"
        >
        @foreach ($product as $barang )
        <article
          class="bg-white rounded-lg shadow hover:shadow-lg transition flex flex-col">
          <img
            alt="Red sneakers with white soles on a white background"
            class="rounded-t-lg w-full object-cover aspect-square"
            height="400"
            src="{{ asset('uploads/barang') }}/{{ $barang->gambar }}"
            width="400"
          />
          <div class="p-4 flex flex-col flex-grow">
            <h3 class="text-lg font-semibold text-gray-900 mb-2">
              {{ $barang->nama }}
            </h3>
            <p class="text-gray-600 flex-grow">
              {{ $barang->deskripsi }}
            </p>
            <div class="mt-4 flex items-center justify-between">
              <span class="text-xl font-bold text-blue-600"> Rp.{{ $barang->harga }} </span>
              <button
                class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition text-sm"
              >
                Add to Cart
              </button>
            </div>
          </div>
        </article>
        @endforeach


        </div>
      </section> --}}
</x-font-layout>
