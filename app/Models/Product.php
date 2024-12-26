<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Symfony\Component\CssSelector\Node\FunctionNode;

use function PHPUnit\Framework\returnSelf;

class Product extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }


    public function categoryProducts(){
        return $this->hasMany(CategoryProduct::class);
    }

    public function carts(){
        return $this->hasMany(Carts::class);
    }




}
