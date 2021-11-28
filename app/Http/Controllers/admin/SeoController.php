<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\BlogSeo;
use App\Models\LoginSeo;
use App\Models\RegisterSeo;
use App\Models\SssSeo;
use Illuminate\Http\Request;

class SeoController extends Controller
{
    public function index(){

        $loginSeo       =   LoginSeo::find(1);
        $blogSeo        =   BlogSeo::find(1);
        $sssSeo         =   SssSeo::find(1);

        return view('admin.seo.seo',compact('loginSeo','blogSeo','sssSeo'));
    }
    public function login(){

        $login = LoginSeo::find(1)->update([
           'keyw' => request('keyw'),
           'desc' => request('desc'),
        ]);

        if($login){
            return redirect()->route('admin.seo')->with('message','İşlem Başarıyla Gerçekleşti')->with('message_type','success');
        }

    }
    public function sss(){

        $login = SssSeo::find(1)->update([
           'keyw' => request('keyw'),
           'desc' => request('desc'),
        ]);

        if($login){
            return redirect()->route('admin.seo')->with('message','İşlem Başarıyla Gerçekleşti')->with('message_type','success');
        }

    }
    public function blog(){

        $login = BlogSeo::find(1)->update([
           'keyw' => request('keyw'),
           'desc' => request('desc'),
        ]);

        if($login){
            return redirect()->route('admin.seo')->with('message','İşlem Başarıyla Gerçekleşti')->with('message_type','success');
        }

    }
}
