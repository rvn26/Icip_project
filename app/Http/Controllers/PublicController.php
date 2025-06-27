<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function viewshop()
    {
        $product = Product::all();
        return view('shop_public', compact('product'));
    }

        public function shop_detail($id)
    {
        $product = Product::find($id);
        $products = Product::all();
        return view('detail_public', compact('product', 'products'));
    }
}
