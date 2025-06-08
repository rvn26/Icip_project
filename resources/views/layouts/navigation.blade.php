<nav x-data="{ open: false }" class="bg-white  max-w-screen-xl mx-auto ">
    <!-- Primary Navigation Menu -->
    <div class="max-w-[1300px] mx-auto px-4 sm:px-6 lg:px-8">
        <div class=" flex justify-between h-16 items-center">
             <!-- Logo -->
             <div class="left-0 pl-4 shrink-0 flex items-center">
                <a href="{{ Auth::user()->role == 'Admin' ? route('admin.dashboard') : route('dashboard')}}">
                    {{-- <x-application-logo class="block h-9 w-auto fill-current text-gray-800" /> --}}
                    {{-- <x-applogo class="block h-9 w-auto fill-current text-gray-800" /> --}}
                    <img src="{{ asset('images/logo/Logo_Icip.png') }}" alt="" class="sm:w-[120px] h-auto w-[90px]">
                </a>
            </div>

            {{-- navigasi --}}
            <div class="flex justify-between items-center h-16">
               
                <!-- Navigation Links -->
                <div class="flex justify-center">
                <div class="hidden sm:flex mx-auto font-semibold space-x-8 sm:my-px ">
                    <x-nav-link :href="Auth::user()->role == 'Admin' ? route('admin.dashboard') : route('dashboard')" :active="Auth::user()->role == 'Admin' ? request()->routeIs('admin.dashboard') : request()->routeIs('dashboard')">
                        {{ __('Home') }}
                    </x-nav-link>

                {{-- User navigasi --}}
                    @if (auth::user()->role == 'user')
                            <x-nav-link :href="route('shop')" :active="request()->routeIs('shop')">
                                {{ __('Belanja') }}
                            </x-nav-link>
                            <x-nav-link :href="route('contact')" :active="request()->routeIs('contact')">
                                {{ __('Kontak') }}
                            </x-nav-link>
                            {{-- <x-nav-link :href="route('Map')" :active="request()->routeIs('Map')">
                                {{ __('Lokasi') }}
                            </x-nav-link> --}}
                    @endif
                    
                </div>
                </div>
                {{-- <div class="hidden space-x-5 sm:-my-px sm:ms-10 sm:flex">           
                </div> --}}

            </div>
            <div class="flex items-center space-x-4">
                <a href="{{ route('cart') }}" aria-label="Shopping cart" class="relative text-gray-600 hover:text-blue-600 transition text-lg md:text-xl">
                    <i class="fas fa-shopping-cart"> </i>
                    {{-- @if(Cart::instance('cart')->content()->count()>0) --}}
                    <span class="absolute -top-2 -right-2 bg-orange3 text-white rounded-full text-xs w-5 h-5 flex items-center justify-center font-semibold">{{count(session('cart',[])) }}
                    </span>
                    {{-- @endif --}}
                </a>

                <!-- Settings Dropdown -->
                <div class="hidden sm:flex sm:items-center sm:ms-6">
                    
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center  py-2 border-none border-transparent text-sm leading-4 font-medium rounded-md text-black bg-transparent hover:text-black focus:outline-none transition ease-in-out duration-150">                 
                                <div class="ms-1 text-lg md:text-xl px-1 w-10">
                                        <span class="image">
                                            <img src="{{asset('images/avatar/user-1.png')  }} " alt="">
                                        </span>              
                                    {{-- <i class="fas fa-user"> </i> --}}
                                </div>
                                <div>{{ Auth::user()->name }}</div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Profile') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('riwayat.order')">
                                {{ __('Pesanan') }}
                            </x-dropdown-link>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>             

                <!-- Hamburger -->
                <div class="-me-2 flex items-center sm:hidden">
                    <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="Auth::user()->role == 'Admin' ? route('admin.dashboard') : route('dashboard')" :active="Auth::user()->role == 'Admin' ? request()->routeIs('admin.dashboard') : request()->routeIs('dashboard')">
                {{ __('Home') }}
            </x-responsive-nav-link>

        {{-- User navigasi --}}
            @if (auth::user()->role == 'user')
                    <x-responsive-nav-link :href="route('shop')" :active="request()->routeIs('shop')">
                        {{ __('Belanja') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('contact')" :active="request()->routeIs('contact')">
                        {{ __('Kontak') }}
                    </x-responsive-nav-link>
                    {{-- <x-responsive-nav-link :href="route('Map')" :active="request()->routeIs('Map')">
                        {{ __('Lokasi') }}
                    </x-responsive-nav-link> --}}
            @endif
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>
                 <x-responsive-nav-link :href="route('riwayat.order')">
                                {{ __('Pesanan') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
{{-- <aside aria-label="Shopping cart" class="fixed top-0 right-0 h-full w-full max-w-md bg-white shadow-lg transform translate-x-fulltransition-transform duration-300 ease-in-out z-50 flex flex-col" id="cart-sidebar">
    <div class="flex items-center justify-between p-4 border-b border-gray-200">
     <h2 class="text-xl font-semibold text-gray-800">
      Shopping Cart
     </h2>
     <button aria-label="Close cart" class="text-gray-600 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 rounded" id="close-cart">
      <i class="fas fa-times fa-lg">
      </i>
     </button>
    </div>
    <div class="flex-grow overflow-y-auto p-4 space-y-4" id="cart-items" tabindex="0">
     <p class="text-gray-500 text-center">
      Your cart is empty.
     </p>
    </div>
    <div class="p-4 border-t border-gray-200">
     <div class="flex justify-between items-center mb-4">
      <span class="text-lg font-semibold text-gray-800">
       Total:
      </span>
      <span class="text-lg font-bold text-indigo-600" id="cart-total">
       $0.00
      </span>
     </div>
     <button class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-3 rounded disabled:opacity-50 disabled:cursor-not-allowed" disabled="" id="checkout-button">
      Checkout
     </button>
    </div>
</aside> --}}
{{-- <div class="fixed inset-0 bg-black bg-opacity-40 hidden z-40" id="overlay" tabindex="-1">
</div> --}}
