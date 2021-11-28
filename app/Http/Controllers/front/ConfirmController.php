<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ConfirmController extends Controller
{

    public function index(){

        if(!auth()->check()){
            return redirect()->route('login');
        }

        return view('front.confirm.confirm');
    }
    
}
