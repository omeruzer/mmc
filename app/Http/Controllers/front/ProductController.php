<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Comment;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index($category,$slug){

        $product = Product::where('slug',$slug)->firstOrFail();

        $similarProducts = Product::with('getCategory')->inRandomOrder()->where('category',$product->category)->take(10)->get();

        $comments = Comment::where('product',$product->id)->orderByDesc('id')->get();

        $user = Auth::id();

        $images = Image::where('product',$product->id)->get();
        
        return view('front.product.product',compact('product','similarProducts','comments','user','images'));
        
    }

    public function search(){

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
