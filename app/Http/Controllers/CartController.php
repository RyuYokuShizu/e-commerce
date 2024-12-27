<?php

namespace App\Http\Controllers;
use App\Models\Carts;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class CartController extends Controller
{
    private $product;
    private $cart;
    private $user;



    public function __construct(Product $product, Carts $cart, User $user) {
        $this->product = $product;
        $this->cart = $cart;
        $this->user = $user;
    }

    public function create(){
        $user = Auth::user();
        $carts = $user->carts;

        return view('products.cart')->with('carts', $carts);

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