<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogSeo;
use App\Models\Product;
use App\Models\Visitor;
use Illuminate\Http\Request;

class BlogController extends Controller
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

        $blogs = Blog::paginate(6);
        $seo = BlogSeo::find(1);

        return view('front.blog.blog',compact('blogs','seo'));
    }

    public function detail($slug){

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

        $blog = Blog::where('slug',$slug)->firstOrFail();

        $otherBlogs = Blog::inRandomOrder()->take(5)->get();

        $products = Product::with('getCategory')->orderByDesc('id')->take(10)->get();

        return view('front.blog.blog-detail',compact('blog','otherBlogs','products'));
    }

}
