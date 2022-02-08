<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ViberCartProduct extends Model
{
    use HasFactory;

    protected $table    =   ' viber_cart_product';
    protected $guarded  =   [];

    public function geCart(){
        return $this->hasOne('App\Models\ViberCart','id');
    }

    public function getProduct(){
        return $this->hasOne('App\Models\Product','id');
    }
}
