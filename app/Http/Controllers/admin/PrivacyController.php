<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Privacy;
use Illuminate\Http\Request;

class PrivacyController extends Controller
{
    public function index(){
        $privacy = Privacy::find(1);

        return view('admin.privacy.privacy',compact('privacy'));
    }

    public function post(){
        $privacy = Privacy::find(1)->update([
            'keyw'      => request('keyw'),
            'desc'      => request('desc'),
            'privacy'   => request('editor1'),
        ]);

        if($privacy){
            return redirect()->route('admin.privacy')->with('message','İşlem Başarıyla Gerçekleşti')->with('message_type','success')->withInput();
        }
    }
}
