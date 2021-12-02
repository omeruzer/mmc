<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Comment;
use App\Models\Image;
use App\Models\Product;
use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{

    public function index($category,$slug){

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

        $product = Product::where('slug',$slug)->firstOrFail();

        $similarProducts = Product::with('getCategory')->inRandomOrder()->where('category',$product->category)->take(10)->get();

        $comments = Comment::where('product',$product->id)->orderByDesc('id')->get();

        $user = Auth::id();

        $images = Image::where('product',$product->id)->get();

        

        $hit = Product::where('slug',$slug)->update([
            'hit'   =>  $product->hit+1
        ]);
        
        return view('front.product.product',compact('product','similarProducts','comments','user','images'));
        
    }

    public function search(){

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

        $searching = request('searching');


            $products = Product::with('getCategory')->where('name','like','%'.$searching.'%')
            ->orWhere('content','like','%'.$searching.'%')
            ->orWhere('desc','like','%'.$searching.'%')
            ->orWhere('keyw','like','%'.$searching.'%')
            ->orWhere('code','like','%'.$searching.'%')
            ->orderByDesc('id')
            ->paginate(12);        


        return view('front.search.search',compact('searching','products'));

    }




}
