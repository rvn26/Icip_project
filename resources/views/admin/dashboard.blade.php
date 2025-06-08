@extends('layouts.admin_layout')
@section('content')
    {{-- <form action="{{ route('admin.exel') }}" method="GET">
        <label for="bulan">Pilih Bulan:</label>
        <select class="tf-button style-1 w208 mb-5 text-center" aria-label="Large select example" name="bulan" id="bulan">
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
        </select>
        <button class="tf-button style-1 w208" type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round" class="lucide lucide-download-icon lucide-download">
                <path d="M12 15V3" />
                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4" />
                <path d="m7 10 5 5 5-5" />
            </svg>Export Excel</button>
    </form> --}}
    <div class="main-content-inner">
        <div class="main-content-wrap">

            <div class="tf-section-2 mb-30">

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
                                        <div class="body-text mb-2 fw-bold fs-4 ">Total Pesanan</div>
                                        <h4>{{ $order->total() }}</h4>
                                    </div>

                                </div>
                                <div class="dropdown default">
                                    <button class="btn btn-secondary dropdown-toggle" type="button"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="icon-more"><i class="icon-more-horizontal"></i></span>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li>
                                            <a href="javascript:void(0);">hari ini</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);">minggu ini</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);">bulan ini</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>


                        <div class="wg-chart-default mb-20">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap14">
                                    <div class="">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24"
                                            fill="none" stroke="#F24405" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" class="lucide lucide-wallet-icon lucide-wallet">
                                            <path
                                                d="M19 7V4a1 1 0 0 0-1-1H5a2 2 0 0 0 0 4h15a1 1 0 0 1 1 1v4h-3a2 2 0 0 0 0 4h3a1 1 0 0 0 1-1v-2a1 1 0 0 0-1-1" />
                                            <path d="M3 5v14a2 2 0 0 0 2 2h15a1 1 0 0 0 1-1v-4" />
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="body-text mb-2 fw-bold fs-4 ">Total pendapatan</div>
                                        <h4>{{ 'Rp' . number_format($totalAmount, 0, ',', '.') }}</h4>
                                    </div>
                                </div>
                                <div class="dropdown default">
                                    <button class="btn btn-secondary dropdown-toggle" type="button"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="icon-more"><i class="icon-more-horizontal"></i></span>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li>
                                            <a href="javascript:void(0);">hari ini</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);">minggu ini</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);">bulan ini</a>
                                        </li>
                                    </ul>
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
                                            class="lucide lucide-shopping-cart-icon lucide-shopping-cart">
                                            <circle cx="8" cy="21" r="1" />
                                            <circle cx="19" cy="21" r="1" />
                                            <path
                                                d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12" />
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="body-text mb-2 fw-bold fs-4 ">Produk Terjual</div>
                                        <h4>{{ $totalSold }}</h4>
                                    </div>
                                </div>
                                <div class="dropdown default">
                                    <button class="btn btn-secondary dropdown-toggle" type="button"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="icon-more"><i class="icon-more-horizontal"></i></span>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li>
                                            <a href="javascript:void(0);">hari ini</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);">minggu ini</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);">bulan ini</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>


                        <div class="wg-chart-default mb-20">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap14">
                                    <div class="">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                            fill="#F24405" stroke="#F24405" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round"
                                            class="lucide lucide-users-round-icon lucide-users-round">
                                            <path d="M18 21a8 8 0 0 0-16 0" />
                                            <circle cx="10" cy="8" r="5" />
                                            <path d="M22 20c0-3.37-2-6.5-4-8a5 5 0 0 0-.45-8.3" />
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="body-text mb-2 fw-bold fs-4 ">Total Pelanggan</div>
                                        <h4>{{ $totalCustomers }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>


                    {{-- <div class="w-half">

                        <div class="wg-chart-default mb-20">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap14">
                                    <div class="image ic-bg">
                                        <i class="icon-shopping-bag"></i>
                                    </div>
                                    <div>
                                        <div class="body-text mb-2 fw-bold fs-4 ">Total Pelanggan</div>
                                        <h4>{{ $totalCustomers }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="wg-chart-default mb-20">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap14">
                                    <div class="image ic-bg">
                                        <i class="icon-dollar-sign"></i>
                                    </div>
                                    <div>
                                        <div class="body-text mb-2 fw-bold fs-4 ">Delivered Orders Amount</div>
                                        <h4>0.00</h4>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div> --}}
                </div>
                <div class="wg-box">
                    <div class="flex items-center justify-between">
                        <h5>Product terlaris</h5>
                        <div class="dropdown default">
                            {{-- <a class="btn btn-secondary dropdown-toggle" href="{{ route('admin.order') }}">
                                <span class="view-all">Product terlaris</span>
                            </a> --}}
                        </div>

                    </div>
                    <div class="">
                        <div class="">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width:70px">Id produk</th>
                                        <th class="text-center">Nama</th>
                                        <th class="text-center">Terjual</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($topSoldItems as $item)
                                        <tr>
                                            {{-- {{ dd($item) }} --}}
                                            <td class="text-center">{{ $loop->iteration}}</td>
                                            <td class="text-center">{{ $item->product->nama }}</td>
                                            <td class="text-center">{{ $item->total_sold }}</td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            {{-- grafik --}}
            <div class="tf-section-1 mb-30">
                <div class="wg-box">
                    <div class="flex items-center justify-between">
                        <h5>Earnings revenue</h5>
                        <div class="dropdown default">
                            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <span class="icon-more"><i class="icon-more-horizontal"></i></span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a href="javascript:void(0);">This Week</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">Last Week</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="flex flex-wrap gap40">
                        <div>
                            <div class="mb-2">
                                <div class="block-legend">
                                    <div class="dot t1"></div>
                                    <div class="text-tiny">Revenue</div>
                                </div>
                            </div>
                            <div class="flex items-center gap10">
                                <h4>{{ 'Rp' . number_format($totalAmount, 0, ',', '.') }}</h4>
                                <div class="box-icon-trending up">
                                    <i class="icon-trending-up"></i>
                                    <div class="body-title number">0.56%</div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="mb-2">
                                <div class="block-legend">
                                    <div class="dot t2"></div>
                                    <div class="text-tiny">Order</div>
                                </div>
                            </div>
                            <div class="flex items-center gap10">
                                <h4>$28,305</h4>
                                <div class="box-icon-trending up">
                                    <i class="icon-trending-up"></i>
                                    <div class="body-title number">0.56%</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="line-chart-8"></div>
                </div>

            </div>

            <div class="tf-section mb-30">

                <div class="wg-box">
                    <div class="flex items-center justify-between">
                        <h5>Pesanan Terbaru</h5>
                        <div class="dropdown default">
                            <a class="btn btn-secondary dropdown-toggle" href="{{ route('admin.order') }}">
                                <span class="view-all">Tampilkan semua</span>
                            </a>
                        </div>
                    </div>
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
                                                {{ $orders->created_at->timezone('Asia/Jakarta')->format('d-m-Y H:i') }}
                                            </td>
                                            <td class="text-center">{{ $orders->orderItems->count()}}</td>
                                            <td>{{ $orders->tanggal_dikirim }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('admin.order.detail', ['id' => $orders->id])}}">
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
                </div>
                {{-- {{ dd($datagrafik) }} --}}
            </div>
            
        </div>
        @push('scripts')
            <script src="js/main.js"></script>
            <script>
                const chartData = {
                    pendapatan: @json(array_values($datagrafik['pendapatan'])),
                    pesanan: @json(array_values($datagrafik['pesanan'])),
                    items: @json(array_values($datagrafik['items']))
                };
                (function ($) {

                    var tfLineChart = (function () {

                        var chartBar = function () {
                            if (chart) {
                                chart.destroy();
                            }
                            var options = {
                                series: [
                                    {
                                        name: 'Pendapatan',
                                        type: 'column',
                                        data: chartData.pendapatan
                                    },
                                    {
                                        name: 'Pesanan',
                                        type: 'column',
                                        data: chartData.pesanan
                                    },
                                    {
                                        name: 'Items',
                                        type: 'column',
                                        data: chartData.items
                                    }
                                ],
                                chart: {
                                    height: 350,
                                    // type: 'line',
                                    toolbar: { show: false }
                                },
                                stroke: {
                                    width: [0, 0, 0],
                                    curve: 'smooth'
                                },
                                plotOptions: {
                                    bar: {
                                        columnWidth: '70%',
                                        endingShape: 'rounded'
                                    }
                                },
                                colors: ['#2377FC', '#FFA500', '#078407'],
                                dataLabels: {
                                    enabled: false
                                },
                                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                                xaxis: {
                                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                                    labels: {
                                        style: { colors: '#212529' }
                                    }
                                },
                                yaxis: [
                                    {

                                        seriesName: 'Pendapatan',
                                        title: { text: 'Pendapatan (Rp)' },
                                        labels: {
                                            formatter: val => 'Rp ' + val.toLocaleString(),
                                            style: { color: '#2377FC' }
                                        }
                                    },
                                    {
                                        opposite: true,
                                        seriesName: 'Pesanan',
                                        title: { text: 'Jumlah Pesanan' },
                                        labels: {
                                            style: { color: '#FFA500' }
                                        }
                                    },
                                    {
                                        opposite: true,
                                        seriesName: 'Items',
                                        title: { text: 'Jumlah Barang' },
                                        labels: {
                                            style: { color: '#078407' }
                                        }
                                    },
                                    // show: true,
                                    // labels: {
                                    //     style: {
                                    //         colors: '#212529',
                                    //     },
                                    // },
                                ],
                                tooltip: {
                                    shared: true,
                                    intersect: false,
                                    y: {
                                        formatter: function (val, { series, seriesIndex }) {
                                            if (seriesIndex === 0) {
                                                return 'Rp ' + val.toLocaleString();
                                            } else if (seriesIndex === 1) {
                                                return val + ' Pesanan';
                                            } else if (seriesIndex === 2) {
                                                return val + ' Barang';
                                            }
                                            return val;
                                        }
                                    }
                                }
                            };

                            chart = new ApexCharts(
                                document.querySelector("#line-chart-8"),
                                options
                            );
                            if ($("#line-chart-8").length > 0) {
                                chart.render();
                            }
                        };

                        /* Function ============ */
                        return {
                            init: function () { },

                            load: function () {
                                chartBar();
                            },
                            resize: function () { },
                        };
                    })();

                    jQuery(document).ready(function () { });

                    jQuery(window).on("load", function () {
                        tfLineChart.load();
                    });

                    jQuery(window).on("resize", function () { });
                })(jQuery);
            </script>
        @endpush
    </div>
@endsection