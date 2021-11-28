<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class BlogController extends Controller
{

    public function index(){

        $blogs = Blog::all();

        return view('admin.blog.blog',compact('blogs'));
    }

    public function create(){

        if(request()->isMethod('POST')){

            $this->validate(request(),[
                'title'     =>  'required',
                'desc'      =>  'required',
                'keyw'      =>  'required',
                'img'       =>  'required',
                'editor1'   =>  'required',
            ]);

            if(request()->hasFile('img')){


                $this->validate(request(),[
                    'img' => 'image|mimes:jpg,png,jpeg|max:2048',
                ]);

                $img = request()->file('img');

                $imgName = rand(0,999).'-'.time(). '.' . $img->extension();
    
                if($img->isValid()){

                    $img->move('assets/images/blogs',$imgName);

                }
            }

            Blog::create([
                'title'     =>  request('title'),
                'desc'      =>  request('desc'),
                'keyw'      =>  request('keyw'),
                'content'   =>  request('editor1'),
                'img'       =>  $imgName,
                'slug'      =>  Str::slug(request('title'))
            ]);

            return redirect()->route('admin.blog')->with('message','İşlem Başarıyla Gerçekleşti')->with('message_type','success')->withInput();
        }

        return view('admin.blog.create');
    }
   
    public function edit($slug){
        $blog = Blog::where('slug',$slug)->FirstOrFail();
        //dd($branch);
        
        return view('admin.blog.edit',compact('blog'));
    }

    public function save($slug){

        $this->validate(request(),[
            'title'     =>  'required',
            'desc'      =>  'required',
            'keyw'      =>  'required',
            'editor1'   =>  'required',
        ]);

        $data = [
            'title'     =>  request('title'),
            'keyw'      =>  request('keyw'),
            'desc'      =>  request('desc'),
            'content'   =>  request('editor1'),
            'slug'      =>  Str::slug(request('title'))
        ];
        
        if(request()->hasFile('img')){
            $this->validate(request(),[
                'img'   => 'image|mimes:jpg,png,jpeg|max:2048',
            ]);

            $img    = request()->file('img');

            $imgName = rand(0,999).'-'.time(). '.' . $img->extension();

            if($img->isValid()){

                $delete = Blog::where('slug',$slug)->firstOrFail();
                $trash  = $delete->img;
                $path   = 'assets/images/blogs/'. $trash;

                unlink($path); // Eski Resmi Dosyadan Siler

                $img->move('assets/images/blogs',$imgName); // Yeni Resmi Dosyaya Yükler

                $data['img'] = $imgName;
            }
        }

        Blog::where('slug',$slug)->update($data);

        return redirect()->route('admin.blog')->with('message','İşlem Başarıyla Gerçekleşti')->with('message_type','success');;

    }

    public function delete($slug){

        $delete = Blog::where('slug',$slug)->firstOrFail();
        $trash  = $delete->img;
        
        $path   = 'assets/images/blogs/'.$trash;

        unlink($path); // Eski Resmi Dosyadan Siler

        Blog::where('slug',$slug)->delete();

        return redirect()->route('admin.blog')->with('message','İşlem Başarıyla Gerçekleşti')->with('message_type','success');
    }
}
