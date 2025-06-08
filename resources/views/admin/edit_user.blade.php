@extends('layouts.admin_layout')
@section('content')
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
                action="{{ route('admin.user.update') }}">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" value="{{ $user->id }}">
                <div class="wg-box">
                    <fieldset class="name">
                        <div class="body-title mb-10">Nama<span class="tf-color-1">*</span>
                        </div>
                        <input class="mb-10" type="text" placeholder="name" name="name" tabindex="0"
                            value="{{$user->name}}" aria-required="true" required="">
                        
                    </fieldset>
                    @error('nama')<span class="alert alert-danger text-center">{{ $Message }} </span>
                    @enderror

                   <fieldset class="email">
                        <div class="body-title mb-10">Email<span class="tf-color-1">*</span>
                        </div>
                        <input class="mb-10" type="text" placeholder="Masukan nama produk" name="email" tabindex="0"
                            value="{{$user->email}}" aria-required="true" required="">
                        
                    </fieldset>
                    @error('deskripsi')<span class="alert alert-danger text-center">{{ $Message }}
                        </span>
                    @enderror


                    <fieldset class="name">
                        <div class="body-title mb-10">Role<span class="tf-color-1">*</span></div>
                        {{-- <input class="mb-10" type="text" placeholder="Masukan Harga" name="harga" tabindex="0"
                            value="{{ $user->role }}" aria-required="true" required=""> --}}
                        {{-- <input type="hidden" name="role" value="{{ $user->role }}"/> --}}
                        <div class="row">
                        <div class="mb-10">
                            <div class="select">
                                <select id="role" name="role">                            
                                    <option value="Admin" {{$user->role=="Admin" ? "selected":""}}>Admin</option>
                                    <option value="Kasir" {{$user->role=="Kasir" ? "selected":""}}>Kasir</option>
                                    <option value="user" {{$user->role=="user" ? "selected":""}}>user</option>
                                </select>
                            </div>
                        </div>                
                    </div>
                    </fieldset>
                    
                    <div class="col-md-3">
                            <button type="submit" class="btn btn-primary tf-button w208">Update</button>
                        </div> 
                    {{-- <div class="cols gap10">
                        <button class="tf-button w-full" type="submit">Tambahkan</button>
                    </div> --}}
                </div>
                
            </form>
            <!-- /form-add-product -->
        </div>
        <!-- /main-content-wrap -->
    </div>
@endsection