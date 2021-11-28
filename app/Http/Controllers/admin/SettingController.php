<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Settings;
use Illuminate\Http\Request;

class SettingController extends Controller
{

    public function index(){

        $setting = Settings::find(1);

        return view('admin.setting.setting',compact('setting'));
    }

    public function update($id=1){

        $this->validate(request(),[
            'title'     =>  'required',
            'desc'      =>  'required',
            'keyw'      =>  'required',
            'author'    =>  'required',
        ]);

        $setting = Settings::where('id',$id);

        $setting->update([
            'title'     =>  request('title'),
            'desc'      =>  request('desc'),
            'keyw'      =>  request('keyw'),
            'author'    =>  request('author'),
        ]);
        
        return redirect()->route('admin.setting')->with('message','İşlem Başarıyla Gerçekleşti')->with('message_type','success')->withInput();
    }
    
}
