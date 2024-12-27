<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

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
        
        $user = Auth::user();
        $all_products = $this->product->all();
        return view('home')
        ->with('all_products',$all_products)
        ->with('user', $user);
    }

    public function search(Request $request) {
        $user = Auth::user();
        $all_products = Product::where('name', 'like', '%' . $request->search_product . '%')->get();

        return view('home')
        ->with('all_products', $all_products)
        ->with('user', $user);
    }
}
