<x-app-layout>
  @section('title')
  <title>Dahsbord ICIP-ICIP</title>
  @endsection
  <section class="bg-white w-screen h-screen  ">

    <div
      class="max-w-7xl min-h-screen mx-auto px-4 sm:px-6 lg:px-8 py-10 md:py-20 flex flex-col md:flex-row items-center gap-10">
      <div
        class="md:w-1/2 h-full space-y-6 bg-transparent p-5 rounded-3xl  w-full mt-10 flex items-center justify-center">
        <div class=" h-full space-y-6 w-full ">
          <h1 class="text-4xl md:text-5xl font-extrabold text-black leading-tight font-poppins">
            Selamat Datang Di ICIP-ICIP
          </h1>
          <p class="text-gray-900 text-lg md:text-lg max-w-xl">
            Nikmati lezatnya makaroni keju khas ICIP-ICIP!
            Kami menyajikan berbagai varian makaroni keju dengan rasa gurih, pedas, dan kejunya yang melimpah. Cocok
            untuk camilan saat santai, nonton, atau dijadikan oleh-oleh kekinian.
            Kualitas bahan terbaik, rasa yang bikin nagih, dan harga yang ramah di kantong. Yuk, cicipi makaroni keju
            favoritmu di ICIP-ICIP!
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
          class="rounded-lg w-max h-[650px]  mx-auto mr-0  shadow-black shadow-lg object-cover" height="400"
          src="{{ asset('img/DSCF7772.jpg') }}" width="600" />
      </div>
    </div>
  </section>
  {{-- <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12" id="products">
    <h2 class="text-3xl font-extrabold text-gray-900 mb-8 text-center">
      Produk Kami
    </h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
      @foreach ($product as $barang )
      <article class="bg-white rounded-lg shadow hover:shadow-lg transition flex flex-col">
        <img alt="Red sneakers with white soles on a white background"
          class="rounded-t-lg w-full object-cover aspect-square" height="400"
          src="{{ asset('uploads/barang') }}/{{ $barang->gambar }}" width="400" />
        <div class="p-4 flex flex-col flex-grow">
          <h3 class="text-lg font-semibold text-gray-900 mb-2">
            {{ $barang->nama }}
          </h3>
          <p class="text-gray-600 flex-grow">
            {{ $barang->deskripsi }}
          </p>
          <div class="mt-4 flex items-center justify-between">
            <span class="text-xl font-bold text-black"> Rp.{{ $barang->harga }} </span>
            <button class="bg-orange3 text-white px-4 py-2 rounded-md hover:bg-orange1 transition text-sm">
              Add to Cart
            </button>
          </div>
        </div>
      </article>
      @endforeach --}}
      {{-- <article class="bg-white rounded-lg shadow hover:shadow-lg transition flex flex-col">
        <img alt="Classic black leather jacket on a mannequin with a white background"
          class="rounded-t-lg w-full object-cover aspect-square" height="400"
          src="https://storage.googleapis.com/a1aa/image/0a14c337-c397-4826-1906-14b1dffdb6f6.jpg" width="400" />
        <div class="p-4 flex flex-col flex-grow">
          <h3 class="text-lg font-semibold text-gray-900 mb-2">
            Classic Leather Jacket
          </h3>
          <p class="text-gray-600 flex-grow">
            Timeless black leather jacket made from premium materials.
          </p>
          <div class="mt-4 flex items-center justify-between">
            <span class="text-xl font-bold text-blue-600"> $199.99 </span>
            <button class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition text-sm">
              Add to Cart
            </button>
          </div>
        </div>
      </article> --}}

      {{--
    </div>
  </section> --}}
</x-app-layout>