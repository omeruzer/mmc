<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Privacy;
use App\Models\Visitor;
use Illuminate\Http\Request;

class PrivacyController extends Controller
{
    public function index(){

        $ip         =   $_SERVER['REMOTE_ADDR'];
        $language   =   substr($_SERVER['HTTP_ACCEPT_LANGUAGE'],0,2);
        $url        =   $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
        $browser    =   substr($_SERVER['HTTP_USER_AGENT'],0,12);

        Visitor::create([
            'ip'            =>      $ip,
            'language'      =>      $language,
            'url'           =>      $url,
            'browser'       =>      $browser
        ]);
        
        $privacy = Privacy::find(1);

        return view('front.privacy.privacy',compact('privacy'));
    }
}
