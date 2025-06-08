@extends('layouts.kasir-layout')
@section('content')


    <div class="main-content-inner">
        <div class="main-content-wrap">
            <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                <h3>Pesanan</h3>
                <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                    <li>
                        <a href="{{ route('kasir.dashboard') }}">
                            <div class="text-tiny">Dashboard</div>
                        </a>
                    </li>
                    <li>
                        <i class="icon-chevron-right"></i>
                    </li>
                    <li>
                        <div class="text-tiny">Orders</div>
                    </li>
                </ul>
            </div>
                        <div class="tf-section-1 mb-30">
                <div class="flex gap20 flex-wrap-mobile">
                    <div class="w-half">

                        <div class="wg-chart-default mb-20">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap14">
                                    <div class="">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                            fill="none" stroke="#F24405" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round"
                                            class="lucide lucide-shopping-bag-icon lucide-shopping-bag">
                                            <path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4Z" />
                                            <path d="M3 6h18" />
                                            <path d="M16 10a4 4 0 0 1-8 0" />
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="body-text mb-2 fw-bold fs-4 ">Pesanan Berhasi</div>
                                        <h4>{{ $berhasilOrders}}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="w-half">

                        <div class="wg-chart-default mb-20">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap14">
                                    <div class="">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                            fill="none" stroke="#F24405" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round"
                                            class="lucide lucide-shopping-bag-icon lucide-shopping-bag">
                                            <path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4Z" />
                                            <path d="M3 6h18" />
                                            <path d="M16 10a4 4 0 0 1-8 0" />
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="body-text mb-2 fw-bold fs-4 ">Pesanan Menunggu</div>
                                        <h4>{{ $prosesOrders }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="w-half">

                        <div class="wg-chart-default mb-20">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap14">
                                    <div class="">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                            fill="none" stroke="#F24405" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round"
                                            class="lucide lucide-shopping-bag-icon lucide-shopping-bag">
                                            <path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4Z" />
                                            <path d="M3 6h18" />
                                            <path d="M16 10a4 4 0 0 1-8 0" />
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="body-text mb-2 fw-bold fs-4 ">Pesanan Dibatalkan</div>
                                        <h4>{{ $batalOrders }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>

            {{-- <div class="wg-box"> --}}

                {{-- <div class="flex items-center justify-between gap10 flex-wrap">
                    <div class="wg-filter flex-grow">
                        <form class="form-search">
                            <fieldset class="name">
                                <input type="text" placeholder="Search here..." class="" name="name" tabindex="2" value=""
                                    aria-required="true" required="">
                            </fieldset>
                            <div class="button-submit">
                                <button class="" type="submit"><i class="icon-search"></i></button>
                            </div>
                        </form>

                    </div>
                    <form action="{{ route('kasir.exel') }}" method="GET">
                        {{-- <label for="bulan">Pilih Bulan:</label> --}}
                        {{-- <select class="tf-button style-3 w208 mb-5 text-center" name="bulan" id="bulan">
                            <option selected>Pilih Bulan</option>
                            <option value="1">Januari</option>
                            <option value="2">Februari</option>
                            <option value="3">Maret</option>
                            <option value="4">April</option>
                            <option value="5">Mei</option>
                            <option value="6">Juni</option>
                            <option value="7">Juli</option>
                            <option value="8">Agustus</option>
                            <option value="9">September</option>
                            <option value="10">Oktober</option>
                            <option value="11">November</option>
                            <option value="12">Desember</option>
                            <!-- dst sampai Desember -->
                        </select>
                        <button class="tf-button style-1 w208" type="submit"><svg
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="lucide lucide-download-icon lucide-download">
                            <path d="M12 15V3" />
                            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4" />
                            <path d="m7 10 5 5 5-5" />
                        </svg>Export Excel</button>
                    </form> --}}
                    {{-- <a class="tf-button style-1 w208" href="{{ route('kasir.tambahproduct') }}"><svg
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="lucide lucide-download-icon lucide-download">
                            <path d="M12 15V3" />
                            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4" />
                            <path d="m7 10 5 5 5-5" />
                        </svg></i>Export exel</a> --}}
                {{-- </div> --}}
                <div class="wg-table table-all-user">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th style="width:70px">No Order</th>
                                    <th class="text-center">Nama</th>
                                    <th class="text-center">Nomer</th>

                                    <th class="text-center">Total</th>

                                    <th class="text-center">Status</th>
                                    <th class="text-center">Tanggal Pesan</th>
                                    <th class="text-center">Total Item</th>
                                    <th class="text-center">Dikirim pada</th>
                                    <th class="text-center">Lihat detail</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order as $orders)
                                    <tr>
                                        <td class="text-center">{{ $orders->id }}</td>
                                        <td class="text-center">{{ $orders->nama }}</td>
                                        <td class="text-center">{{ $orders->nomer }}</td>
                                        <td class="text-center">{{ 'Rp' . number_format($orders->total, 0, ',', '.') }}</td>
                                        <td class="text-center">
                                            @if($orders->status == "terkirim")
                                                <span class="badge bg-success">Terkirim</span>
                                            @elseif($orders->status == "dibatalkan")
                                                <span class="badge bg-danger">Dibatalkan</span>
                                            @else
                                                <span class="badge bg-warning">Dipesan</span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            {{ $orders->created_at->timezone('Asia/Jakarta')->format('d-m-Y H:i') }}</td>
                                        <td class="text-center">{{ $orders->orderItems->count()}}</td>
                                        <td>{{ $orders->tanggal_dikirim }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('kasir.order.detail', ['id' => $orders->id])}}">
                                                <div class="list-icon-function view-icon">
                                                    <div class="item eye">
                                                        <i class="icon-eye"></i>
                                                    </div>
                                                </div>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="divider"></div>
                <div class="flex items-cente justify-between flex-wrap gap10 wgp-pagination">
                    {{ $order->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
@endsection