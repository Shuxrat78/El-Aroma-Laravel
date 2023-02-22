<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function brend(){
        return $this->hasOne(Brand::class, 'id', 'brand_id');
    }

    public function category(){
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public function capacity(){
    return $this->hasOne(Capacity::class, 'id', 'capacity_id');
    }
}
