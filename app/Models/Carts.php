<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Carts extends Model
{
    use HasFactory;

    protected $table    =   'cart';
    protected $guarded  =   [];


    public function getOrder(){
        return $this->hasOne('App\Models\Order','id');
    }

    public function getProduct(){
        return $this->hasOne('App\Models\Product','id');
    }


    public function cartProductQty(){
        return DB::table('cartproduct')->where('cart',$this->id)->sum('quantity');
    }

    public function cartProduct(){
        return $this->hasMany('App\Models\CartProduct','cart');
    }

    public function getUser(){
        return $this->belongsTo('App\Models\User','user');
    }

}
