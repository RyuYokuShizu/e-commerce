<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    public function categoryProducts(){
        return $this->hasMany(CategoryProduct::class);
    }
}
