<x-app-layout>
    <div class="bg-white mt-16 p-6">
        <div class="max-w-5xl mx-auto">
            <h2 class="text-lg font-semibold text-slate-800 mb-4 flex items-center gap-2">
                <i class="far fa-clipboard text-slate-700"></i> Riwayat Pesanan
            </h2>
            @foreach ($order as $pesanan)
                    <div class="bg-white border mb-5 border-slate-200 rounded-xl p-6 shadow-md">
                        <div class="flex justify-between items-start mb-4">
                            <h3 class="text-slate-800 font-semibold text-lg">Pesanan
                                #{{  $number = $order->total() - ($order->currentPage() - 1) * $order->perPage() - $loop->index }}
                            </h3>
                            @if($pesanan->status == "terkirim")
                                <span
                                    class="text-xs font-semibold bg-green-100 text-green-700 rounded-full px-3 py-1 select-none">Diterima</span>
                            @elseif($pesanan->status == "dibatalkan")
                                <span
                                    class="text-xs font-semibold bg-red-100 text-red-700 rounded-full px-3 py-1 select-none">Dibatalkan</span>
                            @else
                                <span
                                    class="text-xs font-semibold bg-yellow-100 text-yellow-700 rounded-full px-3 py-1 select-none">Pending</span>
                            @endif

                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-y-2 gap-x-6 text-slate-700 text-sm mb-4">
                            <p><span class="font-semibold text-slate-800">Nama: </span>{{ $pesanan->user->name }}</p>
                            <p><span class="font-semibold text-slate-800">Metode Pembayaran:
                                </span>{{ $pesanan->transaksi->mode }} </p>
                            {{-- {{ dd($pesanan->transaksi) }} --}}
                            <p><span class="font-semibold text-slate-800">Tanggal pesanan:
                                </span>{{ $pesanan->created_at->timezone('Asia/Jakarta')->format('d-m-Y H:i:s') }}</p>
                            <p><span class="font-semibold text-slate-800">Tanggal Diterima:
                                </span>{{ $pesanan->tanggal_dikirim}}</p>
                            <p><span class="font-semibold text-slate-800">Total:
                                </span>{{ 'Rp' . number_format($pesanan->total, 2, ',', '.') }} </p>
                            <p><span class="font-semibold text-slate-800">Status Transaksi:
                                </span>
                                @if($pesanan->transaksi->status == "disetujui")
                                    <span
                                        class="text-xs font-semibold bg-green-100 text-green-700 rounded-full px-3 py-1 select-none">Sukses</span>
                                @elseif($pesanan->transaksi->status == "ditolak" || $pesanan->transaksi->status == "dikembalikan")
                                    <span
                                        class="text-xs font-semibold bg-red-100 text-red-700 rounded-full px-3 py-1 select-none">Gagal</span>
                                @else
                                    <span
                                        class="text-xs font-semibold bg-yellow-100 text-yellow-700 rounded-full px-3 py-1 select-none">Menunggu</span>
                                @endif
                            </p>
                        </div>
                        <div class="bg-slate-50 rounded-lg p-4 text-slate-900 text-sm mb-5">
                            <p class="font-semibold mb-1">Item Pesanan:</p>
                            @foreach($pesanan->orderItems as $item)
                                <ul class="list-disc list-inside">
                                    <li>{{ $item->product->nama  }} × {{ $item->quantity }} =
                                        {{ 'Rp' . number_format($item->harga * $item->quantity, 2, ',', '.') }}
                                    </li>
                                </ul>
                            @endforeach
                        </div>
                        {{-- <form action="{{ route('admin.exel') }}" method="GET">--}}
                            <div class="flex gap-5">

                                {{--
                        </form> --}}
                        @if($pesanan->status == "terkirim")
                            <a href="{{ route('cetak.pdf', ['id' => $pesanan->id]) }}"
                                class="flex items-center w-40  gap-2 px-2 py-2 bg-orange3 text-white font-medium  rounded-lg shadow hover:bg-orange2 transition duration-300"
                                type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="lucide lucide-download-icon lucide-download">
                                    <path d="M12 15V3" />
                                    <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4" />
                                    <path d="m7 10 5 5 5-5" />
                                </svg>Cetak Invoice</a>
                        @elseif($pesanan->status == "dibatalkan")
                            <a disabled
                                class="cursor-not-allowed flex items-center w-40  gap-2 px-2 py-2 bg-orange3 text-white font-medium  rounded-lg shadow hover:bg-orange2 transition duration-300"
                                type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="lucide lucide-download-icon lucide-download">
                                    <path d="M12 15V3" />
                                    <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4" />
                                    <path d="m7 10 5 5 5-5" />
                                </svg>Cetak Invoice</a>
                        @else
                            <a disabled
                                class="cursor-not-allowed flex items-center w-40  gap-2 px-2 py-2 bg-orange3 text-white font-medium  rounded-lg shadow hover:bg-orange2 transition duration-300"
                                type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="lucide lucide-download-icon lucide-download">
                                    <path d="M12 15V3" />
                                    <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4" />
                                    <path d="m7 10 5 5 5-5" />
                                </svg>Cetak Invoice</a>
                        @endif
                        @if($pesanan->transaksi->status == "disetujui")
                            <button
                                class=" hidden flex items-center gap-2 px-2 py-2 bg-orange3 text-white font-medium rounded-lg shadow hover:bg-orange2 transition duration-300"
                                type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="lucide lucide-credit-card-icon lucide-credit-card">
                                    <rect width="20" height="14" x="2" y="5" rx="2" />
                                    <line x1="2" x2="22" y1="10" y2="10" />
                                </svg>Bayar</button>
                        @elseif($pesanan->transaksi->status == "ditolak" || $pesanan->transaksi->status == "dikembalikan")
                            <button
                                class=" hidden flex items-center gap-2 px-2 py-2 bg-orange3 text-white font-medium rounded-lg shadow hover:bg-orange2 transition duration-300"
                                type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="lucide lucide-credit-card-icon lucide-credit-card">
                                    <rect width="20" height="14" x="2" y="5" rx="2" />
                                    <line x1="2" x2="22" y1="10" y2="10" />
                                </svg>Bayar</button>
                        @elseif($pesanan->transaksi->status == "menunggu" && $pesanan->transaksi->mode == "transfer")
                            <button onclick="payWithSnap('{{ $pesanan->transaksi->snap_token }}')"
                                class=" flex items-center gap-2 px-2 py-2 bg-orange3 text-white font-medium rounded-lg shadow hover:bg-orange2 transition duration-300"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                    class="lucide lucide-credit-card-icon lucide-credit-card">
                                    <rect width="20" height="14" x="2" y="5" rx="2" />
                                    <line x1="2" x2="22" y1="10" y2="10" />
                                </svg>Bayar</button>
                        @endif

                    </div>
                    {{-- {{ dd($pesanan->transaksi) }} --}}
                </div>
            @endforeach

    </div>
    <nav aria-label="Pagination" class="mt-6 w flex justify-center">
        <ul class="inline-flex items-center -space-x-px text-sm font-medium text-slate-700">
            @if ($order->onFirstPage())
                <li>
                    <a disabled
                        class="cursor-not-allowed px-3 py-1 rounded-l-lg border border-slate-300 bg-slate-100 text-slate-400">
                        <span class="sr-only">&laquo;</span>
                        <i class="fas fa-chevron-left"></i>
                    </a>

                </li>
            @else
                <li>
                    <a href="{{ $order->previousPageUrl() }}"
                        class=" px-3 py-1 rounded-l-lg border border-slate-300 bg-white hover:bg-slate-100">
                        <span class="sr-only">&laquo;</span>
                        <i class="fas fa-chevron-left"></i>
                    </a>
                </li>
            @endif
            @for ($i = 1; $i <= $order->lastPage(); $i++)
                @if ($i == $order->currentPage())
                    <li class="z-10 px-3 py-1 border border-slate-300 bg-slate-200 text-slate-900 rounded-none">{{
                    $i }}
                    </li>
                @else
                    <li>
                        <a href="{{ $order->url($i) }}"
                            class="px-3 py-1 border border-slate-300 bg-white hover:bg-slate-100 rounded-none">{{
                    $i }}</a>
                    </li>

                @endif
            @endfor
            @if ($order->hasMorePages())
                <li>
                    <a href="{{ $order->nextPageUrl() }}"
                        class=" px-3 py-1 rounded-r-lg border border-slate-300 bg-white hover:bg-slate-100">
                        <span class="sr-only">&laquo;</span>
                        <i class="fas fa-chevron-right"></i>
                    </a>
                </li>
            @else
                <li>
                    <a disabled
                        class="cursor-not-allowed px-3 py-1 rounded-r-lg border border-slate-300 bg-slate-100 text-slate-400">
                        <span class="sr-only">&laquo;</span>
                        <i class="fas fa-chevron-right"></i>
                    </a>

                </li>
            @endif
        </ul>
    </nav>
    {{-- <div class="custom-pagination" style="margin-top: 20px;">
        <nav>
            <ul style="list-style: none; display: flex; gap: 5px; padding-left: 0;">
                {{-- Tombol Sebelumnya --}}
                {{-- @if ($order->onFirstPage())
                <li style="padding: 5px 10px; background-color: #ccc; border-radius: 5px;">&laquo;</li>
                @else
                <li>
                    <a href="{{ $order->previousPageUrl() }}"
                        style="padding: 5px 10px; background-color: #f05454; color: white; text-decoration: none; border-radius: 5px;">&laquo;</a>
                </li>
                @endif --}}

                {{-- Tombol Halaman --}}
                {{-- @for ($i = 1; $i <= $order->lastPage(); $i++)
                    @if ($i == $order->currentPage())
                    <li style="padding: 5px 10px; background-color: #30475e; color: white; border-radius: 5px;">{{
                        $i }}
                    </li>
                    @else
                    <li>
                        <a href="{{ $order->url($i) }}"
                            style="padding: 5px 10px; background-color: #dddddd; color: black; text-decoration: none; border-radius: 5px;">{{
                            $i }}</a>
                    </li>
                    @endif
                    @endfor --}}

                    {{-- Tombol Berikutnya --}}
                    {{-- @if ($order->hasMorePages())
                    <li>
                        <a href="{{ $order->nextPageUrl() }}"
                            style="padding: 5px 10px; background-color: #f05454; color: white; text-decoration: none; border-radius: 5px;">&raquo;</a>
                    </li>
                    @else
                    <li style="padding: 5px 10px; background-color: #ccc; border-radius: 5px;">&raquo;</li>
                    @endif
            </ul>
        </nav>
    </div> --}}
    
    {{-- @if(isset($pesanan->transaksi->snap_token)) --}}
        @section('scripts')
            <script src="https://app.midtrans.com/snap/snap.js"
                data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
            <script type="text/javascript">
                function payWithSnap(snapToken) {
                    snap.pay(snapToken, {
                        onSuccess: function (result) {
                            window.location.href = "{{ route('cart.confirmation') }}";
                        },
                        onPending: function (result) {
                            window.location.href = "{{ route('riwayat.order') }}";
                        },
                        onError: function (result) {
                            alert("Pembayaran gagal. Silakan coba lagi.");
                            window.location.href = "{{ route('cart') }}";
                        },
                        onClose: function () {
                            console.log("Pembayaran dibatalkan.");
                        }
                    });
                }
            </script>
        @endsection
    {{-- @endif --}}
    </div>
</x-app-layout>