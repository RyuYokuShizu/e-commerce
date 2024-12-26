<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CategoryProduct extends Model
{
    use HasFactory;

    protected $table = 'category_product';
    protected $fillable = ['category_id' , 'product_id'];
    public $timestamps = false;

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function categories(){
        return $this->belongsTo(Categories::class);
    }
}
