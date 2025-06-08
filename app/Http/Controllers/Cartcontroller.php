<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Surfsidemedia\Shoppingcart\Facades\Cart;

class Cartcontroller extends Controller
{
    public function index(){
        $items = Cart::instance('Cart')->content();
        $total = Cart::instance('Cart')->total(); // atau format float: ->priceTotal()
        dd(Cart::instance('Cart')->content());
        dd(Cart::instance('Cart')->total());
        return view('cart', compact('items', 'total'));
    }

    public function addcart(Request $request){
        Cart::instance('Cart')->add(
            $request->id,
            $request->name,
            $request->quantity,
            $request->price
            )->associate('App\Models\Product');
            dd($request->all());
        // return redirect()->back();  
    }
}
