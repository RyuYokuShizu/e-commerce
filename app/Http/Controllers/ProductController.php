<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Categories;
use App\Models\Carts;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\CssSelector\Node\FunctionNode;

class ProductController extends Controller
{
    private  $product;
    private  $category;
    const LOCAL_STORAGE_FOLDER = 'public/image'; 
    private $cart;

    public function __construct(Product $product_model, Categories $category_model, Carts $cart_model) {
        $this->product = $product_model;
        $this->category = $category_model;
        $this->cart = $cart_model;
    }

    public function create(){

        $all_products = $this->product->all();
        $all_categories = $this->category->all();
        return view('create')->with('all_categories', $all_categories)->with('all_products', $all_products);
    }

    //商品の保存`---->>>
    public function store(Request $request){
        $request->validate([
            'name' => 'required|min:1|max:50',
            'description'  => 'required|min:1',
           'image' => 'required|mimes:jpeg,jpg,png,gif|max:1048',
           'stock' => 'required',
           "fee" => 'required'
        ]);


        $this->product->name  =  $request->name;
        $this->product->description = $request->description;
        $this->product->image = $this->saveImage($request->image);
        $this->product->stock = $request->stock;
        $this->product->fee = $request->fee;
        $this->product->save();

        // もしcategoryが選択されていれば、
        if($request->category){
            $categories = [];
            foreach($request->category as $category_id){
                $categories[] = [ 'category_id' => $category_id];
            }
            $this->product->categoryProduct()->createMany($categories);
        }



        return redirect()->route('home');
       


    }

    public function  saveImage($image){
         $image_name = time().'.'.$image->extension();
         $image->storeAs(self::LOCAL_STORAGE_FOLDER , $image_name);

         return $image_name;
    }
//<<<--------ここまで商品の保存
     
                                                            
    public function  update(Request $request,$id){
        $request->validate([
            'name' => 'required|min:1|max:50',
            'description'  => 'required|min:1',
           'image' => 'mimes:jpeg,jpg,png,gif|max:1048',
           'stock' => 'required',
           "fee" => 'required'
        ]);

        $product = $this->product->findOrFail($id);
        $product->name  =  $request->name;
        $product->description = $request->description;
        $product->stock = $request->stock;
        $product->fee = $request->fee;
        $product->save();

        // もしcategoryが選択されていれば、
        if($request->category){
            $categories = [];
            foreach($request->category as $category_id){
                $categories[] = [ 'category_id' => $category_id];
            }
            $this->product->categoryProduct()->createMany($categories);
        }

        if($request->image){
            $this->deleteImage($request->image);

            $product->image = $this->saveImage($request->image);
        }



        // return redirect()->route('');
    }


    public function deleteImage($image){
        $image_path = self::LOCAL_STORAGE_FOLDER.$image;
        if(storage::disk('public')->exists($image_path)){
            storage::disk('public')->delete($image_path);
        }

    }

    public function delete($id){
        $product = $this->product->findOrFail($id);
        $this->deleteImage($product->image);
        $product->destroy();

        return redirect()->route('');
    }

    public function edit($id){
        $product_id = $this->product->findOrFail($id);
        $all_categories = $this->category->all();
        return view('edit')->with('product_id', $product_id)->with('all_categories',$all_categories);
    }

    public function purchase($id){
        $product = $this->product->findOrFail($id);
        return view('purchase')->with('product', $product);
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
