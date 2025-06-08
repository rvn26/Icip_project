@extends('layouts.admin_layout')
@section('content')
<div class="main-content-inner">
    <div class="main-content-wrap">
        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <h3>Users</h3>
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
                    <div class="text-tiny">All User</div>
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
                
            </div>
            <div class="wg-table table-all-user">

                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>User</th>
                                <th>Email</th>
                                <th>Role</th>
                                {{-- <th class="text-center">Total Orders</th> --}}
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user as $users )
                            
                            
                            <tr>
                                <td>{{ $users->id }}</td>
                                <td class="pname">
                                    <div class="image">
                                        <img src="user-1.html" alt="" class="image">
                                    </div>
                                    <div class="name">
                                        <a href="#" class="body-title-2">{{ $users->name }}</a>
                                        <div class="text-tiny mt-3">ADM</div>
                                    </div>
                                </td>
                                <td>{{ $users->email }}</td>
                                <td>{{ $users->role }}</td>
                                {{-- <td class="text-center"><a href="#" target="_blank">0</a></td> --}}
                                <td>
                                    <div class="list-icon-function">
                                        <a href="{{ route('admin.user.edit',['id'=> $users->id] )}}">
                                            <div class="item edit">
                                                <i class="icon-edit-3"></i>
                                            </div>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
            <div class="divider"></div>
            <div class="flex items-center justify-between flex-wrap gap10 wgp-pagination">

            </div>
        </div>
    </div>
</div>
@endsection