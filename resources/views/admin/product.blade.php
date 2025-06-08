@extends('layouts.admin_layout')
@section('content')
<div class="main-content-inner">
    <div class="main-content-wrap">
        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <h3>All Products</h3>
            <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                <li>
                    <a href="{{ route('admin.dashboard') }}">
                        <div class="text-tiny">Dashboard</div>
                    </a>
                </li>
                <li>
                    <i class="icon-chevron-right"></i>
                </li>
                <li>
                    <div class="text-tiny">All Products</div>
                </li>
            </ul>
        </div>

        <div class="wg-box">
            <div class="flex items-center justify-between gap10 flex-wrap">
                <div class="wg-filter flex-grow">
                    <form class="form-search">
                        <fieldset class="name">
                            <input type="text" placeholder="Search here..." class="" name="name"
                                tabindex="2" value="" aria-required="true" required="">
                        </fieldset>
                        <div class="button-submit">
                            <button class="" type="submit"><i class="icon-search"></i></button>
                        </div>
                    </form>
                </div>
                <a class="tf-button style-1 w208" href="{{ route('admin.tambahproduct') }}"><i
                        class="icon-plus"></i>Add new</a>
            </div>
            <div class="table-responsive">
                @if (Session::has('status'))
                <p class="alert alert-success" id="alert_status">{{ Session::get('status') }}</p>
                @endif
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Nama</th>
                            <th>Harga</th>
                            <th>Deskripsi</th>
                            <th>Stok</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach ($product as $barang)
                        <tr>
                            <td>{{ $barang->id }}</td>
                            <td class="pname">
                                <div class="image">
                                    <img src="{{ asset('uploads/barang') }}/{{ $barang->gambar }}" alt="{{ $barang->nama }}" class="image">
                                </div>
                                <div class="name">
                                    <a href="#" class="body-title-2">{{ $barang->nama }}</a>
                                    {{-- <div class="text-tiny mt-3">product6</div> --}}
                                </div>
                            </td>
                            <td>Rp.{{ $barang->harga }}</td>
                            <td>{{ $barang->deskripsi }}</td>
                            <td>{{ $barang->Stok }}</td>
                            <td>{{ $barang->Status_stok }}</td>
                            <td>
                                <div class="list-icon-function">
                                    {{-- <a href="#" target="_blank">
                                        <div class="item eye">
                                            <i class="icon-eye"></i>
                                        </div>
                                    </a> --}}
                                    <a href="{{ route('admin.edit.product',['id'=>$barang->id]) }}">
                                        <div class="item edit">
                                            <i class="icon-edit-3"></i>
                                        </div>
                                    </a>
                                    <form action="{{ route('admin.hapus.product', ['id'=>$barang->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <div class="item text-danger delete">
                                            <i class="icon-trash-2"></i>
                                        </div>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="divider"></div>
            <div class="flex items-center justify-between flex-wrap gap10 wgp-pagination">
                {{ $product->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(function () {
        $('.delete').on('click', function (e) {
            e.preventDefault(); // Mencegah form langsung submit
            var form = $(this).closest('form'); // Ambil form terdekat
            swal({
                title: "Are you sure?",
                text: "You want to delete this record?",
                icon: "warning",
                buttons: {
                    cancel: {
                        text: "No",
                        visible: true,
                        closeModal: true,
                    },
                    confirm: {
                        text: "Yes",
                        visible: true,
                        closeModal: true,
                        className: "btn-danger"
                    }
                },
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    form.submit(); // Submit form jika user menekan Yes
                }
            });
        });
    });
    // Tunggu 3 detik, lalu sembunyikan alert secara perlahan
    setTimeout(function () {
        const alert = document.getElementById('alert_status');
        if (alert) {
            alert.style.transition = 'opacity 0.5s ease-out';
            alert.style.opacity = '0';
            setTimeout(() => alert.style.display = 'none', 500);
        }
    }, 3000); // 3000 ms = 3 detik
</script>
@endpush