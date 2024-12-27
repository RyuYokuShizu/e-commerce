<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Categories;
use App\Models\Carts;
use App\Services\ProductService;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\CssSelector\Node\FunctionNode;

class ProductController extends Controller
{
    private  $product;
    private  $category;
    const LOCAL_STORAGE_FOLDER = 'public/image'; 
    private $cart;
    public $productService;

    public function __construct(Product $product_model, Categories $category_model, Carts $cart_model, ProductService $productService) {
        $this->product = $product_model;
        $this->category = $category_model;
        $this->cart = $cart_model;
        $this->productService = $productService;
    }

    public function create(){

        $all_products = $this->product->all();
        $all_categories = $this->category->all();
        return view('create')->with('all_categories', $all_categories)->with('all_products', $all_products);
    }

    //商品の保存`---->>>
    public function store(StoreProductRequest $request){
        // StoreProductRequest already validated requests
        // $request->calidated([
        //     'name' => 'required|min:1|max:50',
        //     'description'  => 'required|min:1',
        //     'image' => 'required|mimes:jpeg,jpg,png,gif|max:1048',
        //     'stock' => 'required',
        //     'fee' => 'required'
        // ]);

        $this->product->name  =  $request->name;
        $this->product->description = $request->description;
        $this->product->image = $this->productService->saveImage($request->image);
        $this->product->stock = $request->stock;
        $this->product->fee = $request->fee;
        $this->product->save();

        // もしcategoryが選択されていれば、
        if($request->category){
           $this->productService->saveCategories($this->product, $request->category);
        }

        return redirect()->route('home');
    }

   
//<<<--------ここまで商品の保存
     
                                                            
    public function  update(UpdateProductRequest $request, $id){
        // UpdateProductRequest already validated requests

        $product = $this->product->findOrFail($id);
        $product->name  =  $request->name;
        $product->description = $request->description;
        $product->stock = $request->stock;
        $product->fee = $request->fee;
        $product->save();

        // もしcategoryが選択されていれば、
        // categoryを保存する
        if($request->category){
            $this->productService->saveCategories($this->product, $request->category);
        }

        // 新しいイメージが投稿されたら、元の画像を破壊し新しくする
        if($request->image){
            $this->productService->deleteImage($request->image);

            $product->image = $this->productService->saveImage($request->image);
        }
        // return redirect()->route('');
    }


   

    public function delete($id){
        $product = $this->product->findOrFail($id);
        $this->productService->deleteImage($product->image);
        $product->destroy();

        return redirect()->route('');
    }

    public function edit($id){
        $product = $this->product->findOrFail($id);
        $all_categories = $this->category->all();
        return view('edit')->with('product', $product)->with('all_categories',$all_categories);
    }

    public function purchase($id){
        $product = $this->product->findOrFail($id);
        return view('products.show')->with('product', $product);
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
        $this->cart->save();

        return redirect()->back();
    }




    



    
}
