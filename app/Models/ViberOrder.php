<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ViberOrder extends Model
{
    use HasFactory;

    protected $table    =   'viberorder';
    protected $guarded  =   [];

    public function getViberCartProduct(){
        return $this->hasOne('App\Models\ViberCartProduct','id');
    }
}
