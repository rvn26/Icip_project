<x-app-layout>

    <div class="pt-16 min-h-screen flex items-center justify-center px-4 sm:px-6 md:px-8 ">
        <div class="w-full max-w-4xl bg-white shadow-xl  rounded-lg overflow-hidden" style="box-shadow: 0 0 20px rgba(0,0,0,0.3);">
            <div class="p-4 border-b border-gray-200 flex justify-center items-center">
                <h2 class="text-xl text-center font-semibold text-gray-800">Keranjang Belanja</h2>
                {{-- <a href="{{}}"
                    class="text-gray-600 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 rounded">
                    <i class="fas fa-times fa-lg"></i>
                </a> --}}
            </div>
            <div class="flex-grow overflow-y-auto p-4 space-y-4" id="cart-items" tabindex="0">
            @php
                $total = 0; 
            @endphp
            @if(session('cart'))
               
                @foreach (session('cart') as $key=>$detail)
                @php
                    $total = $total + ($detail['harga'] * $detail['quantity']); 
                @endphp
                <div class="flex items-center space-x-4 border rounded p-1 sm:px-2 px-1  bg-gray-50 font-sans  sm:flex-row ">
            
                    <img src="{{ asset('uploads/barang') }}/{{ $detail['gambar'] }}" alt="{{ $detail['nama'] }}" class="w-16 h-16 object-cover rounded flex-shrink-0">
                    <div class="flex-grow">
                        <p class="font-semibold text-gray-800 text-sm sm:text-base">{{ $detail['nama'] }} </p>
                        <p class="text-black font-bold">{{ 'Rp' . number_format($detail['harga'], 0, ',', '.') }}</p>
                    </div>
                    <div class="flex flex-col sm:flex-row items-center gap-1">
                        <div class="flex  items-center space-x-1 gap-1">
                            <button data-id="{{ $key }}" data-action="decrease" class="text-gray-600 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 rounded p-1" aria-label="Decrease quantity of DSLR Camera">
                                <i class="fas fa-minus"></i>
                            </button>

                            <span class="w-6 text-center font-medium text-gray-800 text-sm sm:text-base">{{ $detail['quantity'] }}</span>
                            
                            <button  data-id="{{ $key }}" data-action="increase" class="text-gray-600 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 rounded p-1" aria-label="Increase quantity of DSLR Camera">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                        <div class="flex items-center space-x-1 sm:ml-3">
                            <p class="text-black font-bold mt-2 sm:mt-0">{{ 'Rp' . number_format($detail['harga'] * $detail['quantity'], 0, ',', '.') }}</p>
                        </div>
                    </div>
                    <button data-id="{{ $key }}" class="text-red-600 hover:text-red-800 focus:outline-none focus:ring-2 focus:ring-red-500 rounded p-1 ml-2 delete-item" aria-label="Remove DSLR Camera from cart">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                
                </div>
                @endforeach
            @else
                <div class="p-4 space-y-4 overflow-y-auto max-h-80" id="cart-items" style="max-height: 400px;">
                    <p class="text-gray-500 text-center">Keranjang kamu kosong.</p>
                    <div class="flex justify-center">
                        <a class="inline-flex items-center bg-blue-600 text-white px-4 py-3 rounded-md font-semibold text-md hover:bg-blue-700 transition w-fit"
                           href="{{ route('shop') }}">
                           belanja sekarang
                        </a>
                      </div>
                 
                </div>
            @endif
            </div>
            <div class="p-4 border-t border-gray-200">
                <div class="flex justify-between items-center mb-4 mx-5">
                    <span class="text-lg font-semibold text-gray-800"></span>
                    <span class="text-lg font-bold text-black" id="cart-total">Total :  {{ 'Rp' . number_format($total, 0, ',', '.') }}</span>
            </div>
            <div class="mt-8 flex flex-col md:flex-row md:justify-between md:items-center space-y-4 md:space-y-0">
                <a class="inline-flex items-center justify-center px-6 py-3 border border-gray-300 rounded-md shadow-sm text-gray-700 font-semibold hover:bg-orange3 hover:text-cream focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition" href="{{ route('shop') }}">
                    <i class="fas fa-arrow-left mr-2">
                    </i>
                    Continue Shopping
                </a>
                <button 
                    class="w-full sm:w-44 inline-flex items-center justify-center px-6  bg-orange2 hover:bg-orange3 text-white font-semibold py-3 rounded disabled:opacity-50 disabled:cursor-not-allowed"
                    disabled id="checkout-button">
                    Checkout
                </button>
            </div> 
            </div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const checkoutBtn = document.getElementById("checkout-button");

            // Contoh kondisi: cart tidak kosong
            const cartItems = @json(session('cart')); // Ubah ini dengan pengecekan nyata

            if (cartItems && Object.keys(cartItems).length > 0) {
                checkoutBtn.disabled = false;
            }else{
                checkoutBtn.disabled = true;
            }
        });
          document.getElementById("checkout-button").addEventListener("click", function () {
    // 
                window.location.href = "{{ route('cart.checkout') }}";
        });
        document.querySelectorAll('button[data-action]').forEach(button => {
            button.addEventListener('click', async () => {
                const id = button.getAttribute('data-id');
                const action = button.getAttribute('data-action');
    
                const response = await fetch("{{ route('cart.update') }}", {
                    method: "POST",
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ id, action })
                });
    
                if (response.ok) {
                    location.reload(); // atau update DOM secara dinamis
                }
            });
        });

        document.querySelectorAll('.delete-item').forEach(button => {
        button.addEventListener('click', async () => {
            const id = button.getAttribute('data-id');

            const response = await fetch("{{ route('cart.remove') }}", {
                method: "POST",
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ id })
            });

            if (response.ok) {
                location.reload(); // Refresh keranjang setelah hapus item
            }
        });
    });
    </script>
    
</x-app-layout>