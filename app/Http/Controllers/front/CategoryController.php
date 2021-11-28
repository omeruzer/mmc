<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index($slug){

        $category = Category::where('slug',$slug)->firstOrFail();

        $sortby = request('sortby');
        if($sortby == 'hits'){
            
            $products = Product::with('getCategory')->where('category',$category->id)->orderByDesc('hit')->paginate(12);

        }elseif($sortby == 'cheap'){

            $products = Product::with('getCategory')->where('category',$category->id)->orderBy('price')->paginate(12);

        }elseif($sortby == 'expensive'){

            $products = Product::with('getCategory')->where('category',$category->id)->orderByDesc('price')->paginate(12);

        }elseif($sortby == 'new'){

            $products = Product::with('getCategory')->where('category',$category->id)->orderByDesc('id')->paginate(12);

        }elseif($sortby == 'old'){

            $products = Product::with('getCategory')->where('category',$category->id)->orderBy('id')->paginate(12);

        }elseif($sortby == 'az'){

            $products = Product::with('getCategory')->where('category',$category->id)->orderBy('name')->paginate(12);

        }elseif($sortby == 'za'){

            $products = Product::with('getCategory')->where('category',$category->id)->orderByDesc('name')->paginate(12);

        }else{

            $products = Product::with('getCategory')->where('category',$category->id)->orderByDesc('id')->paginate(12);
        
        }


        return view('front.category.category',compact('category','products'));
    }
}
