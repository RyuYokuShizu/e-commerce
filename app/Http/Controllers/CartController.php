<?php

namespace App\Http\Controllers;
use App\Models\Carts;
use App\Models\Product;

use Illuminate\Http\Request;

class CartController extends Controller
{
    private $product;
    private $cart;

    public function __construct(Product $product, Carts $cart) {
        $this->product = $product;
        $this->cart = $cart;
    }


   
}