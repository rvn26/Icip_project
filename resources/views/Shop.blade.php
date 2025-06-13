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
    <section class="pt-[70px]  max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12" id="products">
      @if(session('success'))
      <div id="success-alert"
      class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-xl font-sans text-center w-3/4 sm:w-fit mx-auto mt-6 mb-6
      fixed left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-50 shadow-lg"
          role="alert">
          <strong>{{ session('success') }}</strong>
      </div>

      <script>
          // Auto-hide after 3 seconds
          setTimeout(function () {
              const alert = document.getElementById('success-alert');
              if (alert) alert.style.display = 'none';
          }, 3000);
      </script>
    @endif
      <div class="swiper-container h-auto js-swiper-slider slideshow slideshow_small slideshow_split " data-settings='{
        "autoplay": {
          "delay": 5000
        },
        "slidesPerView": 1,
        "effect": "fade",
        "loop": true,
        "pagination": {
          "el": ".slideshow-pagination",
          "type": "bullets",
          "clickable": true
        }
      }'>
        <div class="swiper-wrapper">
          <!-- Slide 1 -->
          <div class="swiper-slide !min-h-[500px] !h-[500px] max-w-full w-full mx-auto rounded-2xl shadow-lg  ">
            <div class="flex flex-col md:flex-row   h-[500px]">
              <div class="flex text-cream items-center bg-gradient-to-b from-orange2 via-orange3 to-gray-900 w-full md:w-1/3">
                <div class="p-6 xl:p-12 max-w-xl">
                  <h2 class="uppercase text-cream  text-4xl font-poppins mb-4 animate animate_fade animate_btt animate_delay-2">
                    Makaroni<br /><strong class="font-bold">Icip Icip</strong>
                  </h2>
                  <p class="mb-0 animate animate_fade animate_btt animate_delay-5">
                  Nikmati sensasi pedas khas balado yang dipadukan dengan gurihnya keju, menciptakan rasa unik yang menggoda lidah. Camilan renyah ini cocok untuk kamu yang suka tantangan rasa—manis, gurih, dan pedas jadi satu!
                  </p>
                </div>
              </div>
              <div class="relative w-full md:w-2/3 bg-[#f5e6e0]">
                <img loading="lazy" src="{{ asset('img/DSCF7772.jpg') }}" width="630" height="450" alt="Women's accessories" class="w-full h-full object-cover" />
              </div>
            </div>
          </div>
         
      
          <!-- Slide 2 -->
          <div class="swiper-slide !min-h-[500px] !h-[500px] max-w-full w-full mx-auto rounded-2xl shadow-lg ">
            <div class="flex flex-col md:flex-row   h-[500px]">
              <div class="flex text-cream items-center bg-gradient-to-b from-orange2 via-orange3 to-gray-900 w-full md:w-1/3">
                <div class="p-6 xl:p-12 max-w-xl">
                  <h2 class="uppercase text-cream  text-4xl font-poppins mb-4 animate animate_fade animate_btt animate_delay-2">
                    Makaroni<br /><strong class="font-bold">Icip Icip</strong>
                  </h2>
                  <p class="mb-0 animate animate_fade animate_btt animate_delay-5">
                    Rasa Gurih yang Bikin Meleleh di Lidah!

                    Dibalut dengan taburan keju yang melimpah, makaroni keju ICIP ICIP hadir sebagai camilan sempurna untuk pencinta rasa creamy dan gurih. Tekstur renyah luar biasa, berpadu dengan keju premium yang bikin susah berhenti ngunyah!
                  </p>
                </div>
              </div>
              <div class="relative w-full md:w-2/3 bg-[#f5e6e0]">
                <img loading="lazy" src="{{ asset('uploads/barang/original/1747506937.png') }}" width="630" height="450" alt="Women's accessories" class="w-full h-full object-cover" />
              </div>
            </div>
          </div>

          <div class="swiper-slide !min-h-[500px] !h-[500px] max-w-full w-full mx-auto rounded-2xl shadow-lg  ">
            <div class="flex flex-col md:flex-row   h-[500px]">
              <div class="flex text-cream items-center bg-gradient-to-b from-orange2 via-orange3 to-gray-900 w-full md:w-1/3">
                <div class="p-6 xl:p-12 max-w-xl">
                  <h2 class="uppercase text-cream  text-4xl font-poppins mb-4 animate animate_fade animate_btt animate_delay-2">
                    Makaroni<br /><strong class="font-bold">Icip Icip</strong>
                  </h2>
                  <p class="mb-0 animate animate_fade animate_btt animate_delay-5">
                  Renyah di Luar, Lumer Coklat di Setiap Gigitan!

Inovasi unik dari ICIP-ICIP! Makaroni renyah yang dibalut dengan coklat manis premium, memberikan sensasi camilan manis dan gurih dalam satu gigitan. Cocok untuk kamu yang ingin ngemil beda dari yang lain!
                  </p>    
                </div>
              </div>
              <div class="relative w-full md:w-2/3 bg-[#f5e6e0]">
                <img loading="lazy" src="{{ asset('uploads/barang/original/1747504887.png') }}" width="630" height="450" alt="Women's accessories" class="w-full h-full object-cover" />
              </div>
            </div>
          </div>

        </div>
      
        <!-- Pagination -->
        <div class="relative container p-6 xl:p-12">
          <div class="slideshow-pagination absolute bottom-0 mb-6 flex items-center"></div>
        </div>
      </div>
      
      <div>
        <h2 class="text-3xl font-extrabold text-gray-900 mb-8 text-center">
          Produk Kami
        </h2>
       
    
        <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
          @foreach ($product as $barang )
          @php 
          $gambarList = explode(',', $barang->gambar_detail);
          @endphp
          
          <article class="bg-white rounded-lg shadow-md hover:shadow-2xl transition flex flex-col">
            <a href="{{ route('shop.detail',['id'=>$barang->id]) }}">
            <div class="swiper-container rounded-t-lg w-full aspect-auto">
              <div class="swiper-wrapper">
                @foreach (explode(',',$barang->gambar_detail) as $img)
                  <div class="swiper-slide">
                    <img
                      src="{{ asset('uploads/barang/detail')}}/{{ trim($img) }} "
                      alt="Gambar {{ $barang->nama }}"
                      class="w-full object-cover h-full"
                    />
                  </div>
                @endforeach
              </div>
              <!-- Navigation buttons -->
              {{-- <div class="swiper-button-next"></div>
              <div class="swiper-button-prev"></div> --}}
              <!-- Optional pagination -->
              <div class="swiper-pagination"></div>
            </div>
            <div class="p-2 flex flex-col flex-grow">
              <h3 class="text-lg font-semibold text-gray-900 mb-2">
                {{ $barang->nama }}
              </h3>
              <p class="text-gray-600 flex-grow">
                {{ $barang->deskripsi }}
              </p>
              <div class="mt-3 flex items-center justify-between flex-col sm:flex-row sm:items-center sm:justify-between gap-2">
                <span class="text-lg sm:text-xl font-bold text-balck"> {{ 'Rp' . number_format($barang->harga, 0, ',', '.') }} </span>
                  <a href="{{ route('cart.add', ['id'=>$barang->id]) }}"
                  class="bg-orange3 text-white sm:px-4 px-3 py-2 text-center rounded-md hover:bg-orange2 transition text-sm">
                  Add to Cart
                  </a>
              </div>
            </div>
            </a>
          </article>
          @endforeach

        </div>
      </div>
      </section>
      @section('scripts')
      <script src="asset/js/plugins/jquery.min.js"></script>
      {{-- <script src="asset/js/plugins/bootstrap.bundle.min.js"></script>
      <script src="asset/js/plugins/bootstrap-slider.min.js"></script>
      <script src="asset/js/plugins/swiper.min.js"></script>
      <script src="asset/js/plugins/countdown.js"></script>
      <script src="asset/js/theme.js"></script>  --}}
      @endsection
</x-app-layout>
