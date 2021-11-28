<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
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

        $categories = Category::all();

        return view('admin.category.category',compact('categories'));
    }

    public function create(){

        if(request()->isMethod('POST')){

            $this->validate(request(),[
                'title'     =>  'required',
                'keyw'      =>  'required',
                'desc'      =>  'required',
            ]);

            Category::create([
                'title'     => request('title'),
                'keyw'      => request('keyw'),
                'desc'      => request('desc'),
                'slug'      => Str::slug(request('title'))
            ]);

            return redirect()->route('admin.category')->with('message','İşlem Başarıyla Gerçekleşti')->with('message_type','success')->withInput();
        }

        return view('admin.category.create');
    }
   
    public function edit($slug){
        $category = Category::where('slug',$slug)->FirstOrFail();
        //dd($category);
        
        return view('admin.category.edit',compact('category'));
    }

    public function save($slug){

        $this->validate(request(),[
            'title'     =>  'required',
            'keyw'      =>  'required',
            'desc'      =>  'required',
        ]);

        $category = Category::where('slug',$slug)->firstOrFail();

        $category->update([
            'title'     =>  request('title'),
            'keyw'      =>  request('keyw'),
            'desc'      =>  request('desc'),
            'slug'      =>  Str::slug(request('title'))
        ]);

        return redirect()->route('admin.category')->with('message','İşlem Başarıyla Gerçekleşti')->with('message_type','success')->withInput();

    }

    public function delete($slug){
        $category = Category::where('slug',$slug);
        $category->delete();

        return redirect()->route('admin.category')->with('message','İşlem Başarıyla Gerçekleşti')->with('message_type','success');
    }
}
