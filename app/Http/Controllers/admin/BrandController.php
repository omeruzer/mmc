<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BrandController extends Controller
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
        
        $brands = Brand::all(); 

        return view('admin.brand.brand',compact('brands'));
    }

    public function create(){

        if(request()->isMethod('POST')){

            $this->validate(request(),[
                'name' => 'required',
                'img' => 'required'
            ]);

            if(request()->hasFile('img')){


                $this->validate(request(),[
                    'img' => 'image|mimes:jpg,png,jpeg|max:2048',
                ]);

                $img = request()->file('img');

                $imgName = rand(0,999).'-'.time(). '.' . $img->extension();
    
                if($img->isValid()){

                    $img->move('assets/images/brands',$imgName);

                }
            }

            Brand::create([
                'name' => request('name'),
                'img' => $imgName,
                'slug' => Str::slug(request('name'))
            ]);

            return redirect()->route('admin.brand')->with('message','İşlem Başarıyla Gerçekleşti')->with('message_type','success');;
        }

        return view('admin.brand.create');
    }
   
    public function edit($slug){
        $brand = Brand::where('slug',$slug)->FirstOrFail();
        //dd($brand);
        
        return view('admin.brand.edit',compact('brand'));
    }

    public function save($slug){

        $this->validate(request(),[
            'name' => 'required',
            'img' => 'required'
        ]);

        if(request()->hasFile('img')){
            $this->validate(request(),[
                'img'   => 'image|mimes:jpg,png,jpeg|max:2048',
            ]);

            $img    = request()->file('img');

            $imgName = rand(0,999).'-'.time(). '.' . $img->extension();

            if($img->isValid()){

                $delete = Brand::where('slug',$slug)->firstOrFail();
                $trash  = $delete->img;
                $path   = 'assets/images/brands/'. $trash;

                unlink($path); // Eski Resmi Dosyadan Siler

                $img->move('assets/images/brands',$imgName); // Yeni Resmi Dosyaya Yükler

            }
        }

        $brand = Brand::where('slug',$slug)->firstOrFail();

        $brand->update([
            'name' => request('name'),
            'img'   => $imgName,
            'slug' => Str::slug(request('name'))
        ]);

        return redirect()->route('admin.brand')->with('message','İşlem Başarıyla Gerçekleşti')->with('message_type','success');;

    }

    public function delete($slug){

        $delete = Brand::where('slug',$slug)->firstOrFail();
        $trash  = $delete->img;
        
        $path   = 'assets/images/brands/'.$trash;

        unlink($path); // Eski Resmi Dosyadan Siler

        Brand::where('slug',$slug)->delete();


        return redirect()->route('admin.brand')->with('message','İşlem Başarıyla Gerçekleşti')->with('message_type','success');
    }

}
