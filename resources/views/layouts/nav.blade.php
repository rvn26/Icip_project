<nav x-data="{ open: false }" class="bg-transparent border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-[1290px] mx-auto px-4 sm:px-6 lg:px-8">
        <div class=" flex justify-between h-16 items-center">
             <!-- Logo -->
             <div class="left-0 pl-4 shrink-0 flex items-center">
                <a href="{{ url('/')}}">
                    <img src="{{ asset('images/logo/Logo_Icip.png') }}" alt="" class="w-[120px] h-auto">
                </a>
            </div>

            {{-- navigasi --}}
            <div class="flex justify-between items-center h-16">
               
                <!-- Navigation Links -->
                <div class="hidden mx-auto font-semibold space-x-8 sm:-my-px sm:ms-10 sm:flex ">   
                    <x-nav-link :href="url('/')" :active="request()->routeIs('home')">
                                {{ __('Home') }}
                    </x-nav-link>
                    <x-nav-link :href="url('/belanja')" :active="request()->routeIs('belanja')">
                                {{ __('Belanja') }}
                    </x-nav-link>
                    <x-nav-link :href="url('/Kontak')" :active="request()->routeIs('kontak')">
                                {{ __('Kontak') }}
                    </x-nav-link>        
                </div>
            </div>
          
                

                <!-- Settings Dropdown -->

                <div class="hidden space-x-8 sm:-my-px sm:flex sm:items-center sm:ms-10">
                    {{-- @php
                        $user = auth()->user();
                    @endphp --}}

                    @auth
                        @if (optional(auth()->user())->role === 'Admin')
                            <x-nav-link :href="url('admin/dashboard')" :active="request()->routeIs('admin.dashboard')">
                                {{ __('Home') }}
                            </x-nav-link>
                        @else
                            <x-nav-link :href="url('dashboard')" :active="request()->routeIs('dashboard')">
                                {{ __('Home') }}
                            </x-nav-link>
                        @endif
                    @else
                        <div class="border-1">
                        <x-nav-link :href="url('/login')" :active="request()->routeIs('login')">
                            {{__('Log in')}} 
                        </x-nav-link>
                        </div>
                        @if (Route::has('register'))
                            <x-nav-link :href="url('/register')" :active="request()->routeIs('register')">
                                {{__('Daftar')}} 
                            </x-nav-link>  
                        @endif
                    @endauth
          
                </div>
                <!-- Hamburger -->
                <div class="-me-2 flex items-center sm:hidden">
                    <button @click= "open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="url('/')" :active="request()->routeIs('home')">
                    {{ __('Home') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="url('/belanja')" :active="request()->routeIs('belanja')">
                    {{ __('belanja') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="url('/Kontak')" :active="request()->routeIs('kontak')">
                    {{ __('Kontak') }}
            </x-responsive-nav-link> 
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="mt-3 space-y-1">
            {{-- @php
                $user = auth()->user();
            @endphp --}}

            @auth
                @if (optional(auth()->user())->role === 'Admin')
                    <x-nav-link :href="url('admin/dashboard')" :active="request()->routeIs('admin.dashboard')">
                        {{ __('Home') }}
                    </x-nav-link>
                @else
                    <x-nav-link :href="url('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Home') }}
                    </x-nav-link>
                @endif
            @else
                <x-responsive-nav-link :href="url('/login')" :active="request()->routeIs('login')">
                    {{__('Log in')}} 
                </x-responsive-nav-link>
                @if (Route::has('register'))
                    <x-responsive-nav-link :href="url('/register')" :active="request()->routeIs('register')">
                        {{__('Daftar')}} 
                    </x-responsive-nav-link>  
                @endif
            @endauth
            </div>
        </div>
    </div>
</nav>
