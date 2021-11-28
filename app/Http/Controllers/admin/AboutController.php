<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    
    public function index(){

        $about = About::find(1);

        return view('admin.about.about',compact('about'));
    }

    public function post($id){

        $this->validate(request(),[
            'keyw'      =>  'required',
            'desc'      =>  'required',
            'editor1'   =>  'required',
        ]);

        $about = About::where('id',$id)->update([
            'keyw'  => request('keyw'),
            'desc'  => request('desc'),
            'about' => request('editor1'),
        ]);

        return redirect()->route('admin.about')->with('message','İşlem Başarıyla Gerçekleşti')->with('message_type','success');
        
    }
}
