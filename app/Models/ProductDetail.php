<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    use HasFactory;

    protected $table    =   'productdetails';
    protected $guarded  =   [];

    public function getProduct(){
        return $this->hasOne('App\Models\Product','id','product');
    }

    public function getUser(){
        return $this->hasOne('App\Models\User','id','user');
    }
}
