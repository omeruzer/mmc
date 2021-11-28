<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogSeo;
use App\Models\Product;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(){        

        $blogs = Blog::paginate(6);
        $seo = BlogSeo::find(1);

        return view('front.blog.blog',compact('blogs','seo'));
    }

    public function detail($slug){

        $blog = Blog::where('slug',$slug)->firstOrFail();

        $otherBlogs = Blog::inRandomOrder()->take(5)->get();

        $products = Product::with('getCategory')->orderByDesc('id')->take(10)->get();

        return view('front.blog.blog-detail',compact('blog','otherBlogs','products'));
    }

}
