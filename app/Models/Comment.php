<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $table    =   'comments';
    protected $guarded  =   [];

    public function getProduct(){
        return $this->hasOne('App\Models\Product','id');
    }

    public function getUser(){
        return $this->hasOne('App\Models\User','id','user');
    }

}
