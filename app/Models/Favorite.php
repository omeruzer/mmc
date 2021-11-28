<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;

    protected $table    =   'favorites';
    protected $guarded  =   [];

    public function getProduct(){
        return $this->hasOne('App\Models\Product','id');
    }

    public function getCategory(){
        return $this->hasOne('App\Models\Category','id','category');
    }
}
