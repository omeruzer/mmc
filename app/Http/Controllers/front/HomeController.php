<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Brand;
use App\Models\Favorite;
use App\Models\Product;
use App\Models\ProductDetail;
use Database\Seeders\ProductDetailSeeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){

        $newProducts = Product::with('getCategory')->with('getBrand')->orderByDesc('id')->limit(8)->get();

        $featureds = ProductDetail::with('getProduct.getCategory')->where('featured',1)->orderByDesc('id')->take(8)->get();

        $blogs = Blog::orderByDesc('id')->take(4)->get();
        
        $brands = Brand::all();

        //$a = ProductDetail::where('featured',1)->where('user', Auth::id())->get();

       // dd($a);

                
        return view('front.home.home',compact('newProducts','blogs','brands','featureds'));
    }
}
