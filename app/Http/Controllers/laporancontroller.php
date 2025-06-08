<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class laporancontroller extends Controller
{
    public function exelexport(){
        $order = Order::orderBy('created_at','ASC');
        return view('admin.exel', compact('order'));
    }

     
}
