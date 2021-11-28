<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Privacy;
use Illuminate\Http\Request;

class PrivacyController extends Controller
{
    public function index(){
        $privacy = Privacy::find(1);

        return view('front.privacy.privacy',compact('privacy'));
    }
}
