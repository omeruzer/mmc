<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\SSS;
use App\Models\SssSeo;
use Illuminate\Http\Request;

class SSSController extends Controller
{
    public function index(){
        $questions = SSS::all();
        $seo = SssSeo::find(1);

        return view('front.sss.sss',compact('questions','seo'));
    }
}
