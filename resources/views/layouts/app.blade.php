<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('title')
    {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&amp;display=swap" rel="stylesheet" />
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <link rel="icon" href="{{ asset('images/logo/icip_icip_favicon.ico') }}" type="image/png">
    @yield('styles')


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
     
</head>

<body class=" antialiased ">
    
    <a href="https://wa.me/+6288220132902 " target="_blank" rel="noopener noreferrer"
        class="fixed bottom-10 right-10 bg-green-500 hover:bg-green-600 text-white rounded-full p-4 shadow-lg flex items-center justify-center z-50"
        aria-label="WhatsApp Chat">
        <i class="fab fa-whatsapp fa-lg"></i>
    </a>
    <div class="min-h-screen ">
        <div class="fixed top-0  left-0 w-full z-50 font-poppins">
            @include('layouts.navigation')
        </div>
        <!-- Page Heading -->
        @isset($header)
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">

                    {{ $header }}
                </div>
            </header>
        @endisset

        <!-- Page Content -->
        <main class="min-h-screen" >
            {{ $slot }}
        </main>
    </div>
    {{-- @livewireScripts --}}
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script>
  // Inisialisasi semua swiper dalam halaman (satu per card)
  document.querySelectorAll('.swiper-container').forEach((el, index) => {
    new Swiper(el, {
      loop: true,
      pagination: {
        el: el.querySelector('.swiper-pagination'),
        clickable: true,
      },
      navigation: {
        nextEl: el.querySelector('.swiper-button-next'),
        prevEl: el.querySelector('.swiper-button-prev'),
      },
    });
  });
  </script>
  @yield('scripts')
</body>

</html>