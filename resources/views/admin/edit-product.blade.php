@extends('layouts.admin_layout')
@section('content')


    <!-- main-content-wrap -->
    <div class="main-content-inner">
        <!-- main-content-wrap -->
        <div class="main-content-wrap">
            <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                <h3>Edit Product</h3>
                <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                    <li>
                        <a href="{{ route('admin.tambahproduct') }}">
                            <div class="text-tiny">Dashboard</div>
                        </a>
                    </li>
                    <li>
                        <i class="icon-chevron-right"></i>
                    </li>
                    <li>
                        <a href="{{ route('admin.product') }}">
                            <div class="text-tiny">Products</div>
                        </a>
                    </li>
                    <li>
                        <i class="icon-chevron-right"></i>
                    </li>
                    <li>
                        <div class="text-tiny">edit product</div>
                    </li>
                </ul>
            </div>
            <!-- form-add-product -->
            <form class="tf-section-2 form-add-product" method="POST" enctype="multipart/form-data"
                action="{{ route('admin.update.product') }}">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" value="{{ $product->id }}">
                <div class="wg-box">
                    <fieldset class="name">
                        <div class="body-title mb-10">Nama Produk<span class="tf-color-1">*</span>
                        </div>
                        <input class="mb-10" type="text" placeholder="Masukan nama produk" name="nama" tabindex="0"
                            value="{{$product->nama}}" aria-required="true" required="">
                        <div class="text-tiny">Nama tidak lebih dari 100 kata</div>
                    </fieldset>
                    @error('nama')<span class="alert alert-danger text-center">{{ $Message }} </span>
                    @enderror

                    <fieldset class="description">
                        <div class="body-title mb-10">Deskripsi Produk<span class="tf-color-1">*</span>
                        </div>
                        <textarea class="mb-10" name="deskripsi" placeholder="Description" tabindex="0" aria-required="true"
                            value="{{ $product->deskripsi }}" required="">{{ $product->deskripsi }}</textarea>
                        <div class="text-tiny">Tidak lebih dari 100 kata</div>
                    </fieldset>
                    @error('deskripsi')<span class="alert alert-danger text-center">{{ $Message }}
                        </span>
                    @enderror


                    <fieldset class="name">
                        <div class="body-title mb-10">Harga<span class="tf-color-1">*</span></div>
                        <input class="mb-10" type="text" placeholder="Masukan Harga" name="harga" tabindex="0"
                            value="{{ $product->harga }}" aria-required="true" required="">
                    </fieldset>
                    @error('harga')<span class="alert alert-danger text-center">
                            {{ $Message }}
                        </span>
                    @enderror
                    <fieldset class="name">
                        <div class="body-title mb-10">Stok<span class="tf-color-1">*</span></div>
                        <input class="mb-10" type="text" placeholder="Masukan Stoke" name="Stok" tabindex="0"
                            value="{{ $product->Stok }}" aria-required="true" required="">
                    </fieldset>
                    @error('Stok')<span class="alert alert-danger text-center">
                            {{ $Message }}
                        </span>
                    @enderror

                    <fieldset class="name">
                        <div class="body-title mb-10">Stok</div>
                        <div class="select mb-10">
                            <select class="" name="Status_stok">
                                <option value="tersedia">Tersedia</option>
                                <option value="tidak tersedia">Tidak Tersedia</option>
                            </select>
                        </div>
                    </fieldset>
                </div>
                <div class="wg-box">
                    <fieldset>
                        <div class="body-title">Upload Gambar<span class="tf-color-1">*</span>
                        </div>
                        <div class="upload-image flex-grow">
                            @if ($product->gambar)
                                <div class="item" id="imgpreview">
                                    <img src="{{ asset('uploads/barang') }}/{{ $product->gambar }}" class="effect8" alt="">
                                </div>
                            @endif
                            <div id="upload-file" class="item up-load">
                                <label class="uploadfile" for="myFile">
                                    <span class="icon">
                                        <i class="icon-upload-cloud"></i>
                                    </span>
                                    <span class="body-text">Drop your images here or select <span class="tf-color">click to
                                            browse</span></span>
                                    <input type="file" id="myFile" name="gambar" accept="image/*">
                                </label>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <div class="body-title mb-10">Upload Gallery Images</div>
                        <div class="upload-image mb-16">
                            @if ($product->gambar_detail)
                            @foreach (explode(',',$product->gambar_detail) as $img )
                                <div class="item" id="imgpreview">
                                    <img src="{{ asset('uploads/barang/detail') }}/{{ trim($img) }}" class="effect8" alt="">
                                </div>
                                @endforeach
                            @endif
                            <!-- <div class="item">
            <img src="images/upload/upload-1.png" alt="">
        </div>                                                 -->
                            <div id="galUpload" class="item up-load">
                                <label class="uploadfile" for="gFile">
                                    <span class="icon">
                                        <i class="icon-upload-cloud"></i>
                                    </span>
                                    <span class="text-tiny">Drop your images here or select <span
                                            class="tf-color">click to browse</span></span>
                                    <input type="file" id="gFile" name="images[]" accept="image/*"
                                        multiple="">
                                </label>
                            </div>
                        </div>
                    </fieldset>
                    <div class="cols gap10">
                        <button class="tf-button w-full" type="submit">Tambahkan</button>
                    </div>
                </div>
            </form>
            <!-- /form-add-product -->
        </div>
        <!-- /main-content-wrap -->
    </div>
    <!-- /main-content-wrap -->
@endsection

@push('scripts')
    <script>
        $("#myFile").on("change", function (e) {
            const photoInp = $("#myFile");
            const [file] = this.files;
            if (file) {
                $("#imgpreview img").attr('src', URL.createObjectURL(file));
                $("#imgpreview").show();
            }
        });

        $("#gFile").on("change", function (e) {
            $(".gitems").remove();
            const gFile = $("gFile");
            const gphotos = this.files;
            $.each(gphotos, function (key, val) {
                $("#galUpload").prepend(`<div class="item gitems"><img src="${URL.createObjectURL(val)}" alt=""></div>`);
            });
        });

    </script>
@endpush