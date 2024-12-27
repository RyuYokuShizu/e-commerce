<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductService 
{

  const LOCAL_STORAGE_FOLDER = 'public/image'; 

  public function saveCategories(Product $product, array $request) {
      $categories = [];
      foreach($request as $category_id){
          $categories[] = [ 'category_id' => $category_id];
      }
      $product->categoryProducts()->createMany($categories);
  }

  public function deleteImage($image){
    $image_path = self::LOCAL_STORAGE_FOLDER.$image;
    if(Storage::disk('public')->exists($image_path)){
        storage::disk('public')->delete($image_path);
    }
  }

  public function  saveImage($image){
    $image_name = time().'.'.$image->extension();
    $image->storeAs(self::LOCAL_STORAGE_FOLDER , $image_name);

    return $image_name;
  }

}