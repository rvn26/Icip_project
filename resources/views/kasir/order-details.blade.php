@extends('layouts.kasir-layout')
@section('content')

    <style>
        .table-transaction>tbody>tr:nth-of-type(odd) {
            --bs-table-accent-bg: #fff !important;
        }
    </style>
    <div class="main-content-inner">
        <div class="main-content-wrap">
            <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                <h3>Order Details</h3>
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
                        <div class="text-tiny">Order Items</div>
                    </li>
                </ul>
            </div>
             
            {{-- Detail Pesanan --}}
            <div class="wg-box">
                <div class="flex items-center justify-between gap10 flex-wrap">
                    <div class="wg-filter flex-grow">
                        <h5>Detail Pesanan</h5>
                    </div>
                    <a class="tf-button style-1 w208" href="{{ route('kasir.order') }}">Back</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <tr>
                            <th>Nomer pesanan</th>
                            <td>{{ $order->id }}</td>
                            <th>Nomer</th>
                            <td>{{ $order->nomer }}</td>
                            <th>Tanggal pesanan</th>
                            <td>{{ $order->created_at }}</td>
                        </tr>
                        <tr>
                            
                            <th>Tanggal Terkirim</th>
                            <td>{{ $order->tanggal_dikirim }}</td>
                            <th>Tanggal pembatalan</th>
                            <td>{{ $order->tanggal_dibatalkan }}</td>
                            <th>Status pesanan</th>
                            <td >
                                @if($order->status == "terkirim")
                                    <span class="badge bg-success">Terkirim</span>
                                @elseif($order->status == "dibatalkan")
                                    <span class="badge bg-danger">Dibatalkan</span>
                                @else
                                    <span class="badge bg-warning">Dipesan</span>
                                @endif
                            </td>
                        </tr>
                    </table>
                </div>
            </div>

            {{-- Detail Transaksi --}}
            <div class="wg-box mt-5">
                <h5>Transaksi</h5>
                <div class="table-responsive">
                <table class="table table-striped table-bordered table-transaction">
                    <tbody>
                        <tr>
                            <th>Total</th>
                            <td>{{ 'Rp' . number_format($order->total, 2, ',', '.') }}</td>
                            <th>Payment Mode</th>
                            <td>{{ $transaksi->mode }}</td>
                            <th>Status</th>
                            <td>
                                @if ($transaksi->status == "disetujui")
                                    <span class="badge bg-success">Disetujui</span>
                                @elseif($transaksi->status == "ditolak")
                                    <span class="badge bg-danger">Ditolak</span>
                                @elseif($transaksi->status == "dikembalikan")
                                    <span class="badge bg-secondary">Dikembalikan</span>
                                @else
                                    <span class="badge bg-warning">Menunggu</span>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
                </div>
            </div>

            {{-- Update status --}}
            <div class="wg-box mt-5">
                <h5>Update Order Status</h5>
                <form action="{{route('kasir.order.status.update')}}" method="POST">
                    @csrf
                    @method("PUT")
                    <input type="hidden" name="order_id" value="{{ $transaksi->order->id }}"  />
                    <div class="row">
                        <div class="col-md-3">
                            <div class="select">
                                <select id="order_status" name="order_status">                            
                                    <option value="dipesan" {{$transaksi->order->status=="dipesan" ? "selected":""}}>dipesan</option>
                                    <option value="terkirim" {{$transaksi->order->status=="terkirim" ? "selected":""}}>terkirim</option>
                                    <option value="dibatalkan" {{$transaksi->order->status=="dibatalkan" ? "selected":""}}>dibatalkan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <button type="submit" class="btn btn-primary tf-button w208">Update</button>
                        </div>                    
                    </div>
                </form>
            </div>

            {{-- Detail Item --}}
            <div class="wg-box mt-5">
                <div class="flex items-center justify-between gap10 flex-wrap">
                    <div class="wg-filter flex-grow">
                        <h5>Detail Item</h5>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th class="text-center">Harga</th>
                                <th class="text-center">Quantity</th>
                                <th class="text-center">Return Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orderItems as $items )
                            <tr>

                                <td class="pname">
                                    <div class="image">
                                        <img src="{{ asset('uploads/barang') }}/{{ $items->product->gambar }}" alt="" class="image">
                                    </div>
                                    <div class="name">
                                        <a href="#" target="_blank"
                                            class="body-title-2">{{ $items->product->nama }}</a>
                                    </div>
                                </td>
                                <td class="text-center">{{ 'Rp' . number_format($items->harga, 2, ',', '.') }}</td>
                                <td class="text-center">{{ $items->quantity }}</td>
                                <td class="text-center">{{ $items->status == 0 ? "No" :"Yes"}}</td>
                                <td class="text-center">
                                    <a href="{{ route('shop.detail',['id'=>$items->id]) }}">
                                    <div class="list-icon-function view-icon">
                                        <div class="item eye">
                                            <i class="icon-eye"></i>
                                        </div>
                                    </div>
                                    </a>
                                </td>
                            </tr>

                        </tbody>
                        @endforeach
                    </table>
                </div>

                <div class="divider"></div>
                <div class="flex items-center justify-between flex-wrap gap10 wgp-pagination">
                    {{ $orderItems->links('pagination::bootstrap-5') }}
                </div>
            </div>

            {{-- Alamat --}}
            <div class="wg-box mt-5">
                <h5>Alamat</h5>
                <div class="my-account__address-item col-md-6">
                    <div class="my-account__address-item__detail">
                        <p>{{ $order->nama }}</p>
                        <p>{{ $order->alamat }}</p>
                        <p>{{ $order->kota }}</p>
                        <p>{{ $order->provinsi }}</p>
                        <p>{{ $order->patokan }}</p>
                        <br>
                        <p>Nomer : {{ $order->nomer }}</p>
                    </div>
                </div>
            </div>


        </div>
    </div>


@endsection