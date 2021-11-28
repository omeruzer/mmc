<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{ 
    use HasFactory;

    protected $table    =   'products';
    protected $guarded  =   [];

    public function getCategory(){
        return $this->hasOne('App\Models\Category','id','category');
    }

    public function getBrand(){
        return $this->hasOne('App\Models\Brand','id','brand');
    }

    public function cartProduct(){
        return $this->hasOne('App\Models\CartProduct','id','cartproduct');
    }

    public function getFavorite(){
        return $this->belongsTo('App\Models\Favorite','product');
    }

    public function productDetail(){
        return $this->hasOne('App\Models\ProductDetail')->withDefault();
    }


}
