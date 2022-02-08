<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ViberCart extends Model
{
    use HasFactory;

    protected $table    =   ' viber_cart';
    protected $guarded  =   [];
}
