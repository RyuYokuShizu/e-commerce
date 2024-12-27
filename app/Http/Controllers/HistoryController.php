<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\History;
use App\Models\User;
use App\Models\Carts;
use App\MOdels\product;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{
    private $product;
    private $history;
    private $user;
    private $cart;


    public function __construct(User $user_model,Product $product_model, History $history_model,Carts $cart_model) {
        $this->product = $product_model;    
        $this->history = $history_model;
        $this->user = $user_model;
        $this->cart = $cart_model;
    }

    public function store($product_id){
        $product = $this->product->findOrFail($product_id);

        $this->history->name = $product->name;
        $this->history->description = $product->description;
        $this->history->fee = $product->fee;
        $this->history->image = $product->image;
        $this->history->user_id = Auth::user()->id;
        
        $user = Auth::user();
        if($cart = $user->carts->where('product_id', $product_id)->first()){
            $this->history->stock = $cart->quantity;
            if($this->history->save()){
                $cart->delete();
            }
        }
    }
}
