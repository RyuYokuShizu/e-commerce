<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


     private  $product;
 
     public function __construct(Product $product_model) {
         $this->product = $product_model;
     }


    public function index()
    {
        
        $all_products = $this->product->all();
        return view('home')->with('all_products',$all_products);
    }
}
