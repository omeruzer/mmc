<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Socialmedia;
use Illuminate\Http\Request;

class SocialmediaController extends Controller
{
    public function index(){

        $socialmedia = Socialmedia::find(1);

        return view('admin.socialmedia.socialmedia',compact('socialmedia'));
    } 

    public function update($id=1){

        $this->validate(request(),[
            'facebook'  =>  'required',
            'instagram' =>  'required',
            'telegram'  =>  'required',
            'viber'     =>  'required',
        ]);

        $setting = Socialmedia::where('id',$id);

        $setting->update([
            'facebook'  =>  request('facebook'),
            'instagram' =>  request('instagram'),
            'telegram'  =>  request('telegram'),
            'viber'     =>  request('viber'),
        ]);
        
        return redirect()->route('admin.socialmedia')->with('message','İşlem Başarıyla Gerçekleşti')->with('message_type','success')->withInput();
    }

}
