<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartProduct extends Model
{
    use HasFactory;

    protected $table    =   'cartproduct';
    protected $guarded  =   [];

    public function getProducts(){
        return $this->belongsTo('App\Models\Product','product');
    }


}
