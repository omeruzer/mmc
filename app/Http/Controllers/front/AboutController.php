<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index(){

        $about = About::find(1);

        return view('front.about.about',compact('about'));
    }
}
