<?php

namespace App\Http\Controllers;
use App\Models\Carts;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class CartController extends Controller
{
    private $product;
    private $cart;

    public function __construct(Product $product, Carts $cart) {
        $this->product = $product;
        $this->cart = $cart;
    }



    public function buy(Request $request, $id){
        $request->validate([
            'amount' => 'required|min:1'
        ]);

        $product=$this->product->findOrFail($id);
        $amount = $product->stock;
        $new_amount = $amount - $request->amount;

        $product->stock =  $new_amount;
        $product->save();

        $this->cart->user_id= Auth::user()->id;
        $this->cart->product_id = $id;
        $this->cart->quantity = $request->amount;
        $this->cart->save();

        return redirect()->back();
    }
}