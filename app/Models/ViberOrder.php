<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ViberOrder extends Model
{
    use HasFactory;

    protected $table    =   'viber_order';
    protected $guarded  =   [];

    public function getCartProduct(){
        return $this->hasOne('App\Models\ViberCartProduct','id');
    }
}
