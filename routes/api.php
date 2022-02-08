<?php

use App\Models\Branch;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductDetail;
use App\Models\Socialmedia;
use App\Models\SSS;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('products',function(){
    $a = Product::all();
    return response()->json($a);
});

Route::get('user',function(){
    $a = User::all();
    return response()->json($a);
});

Route::get('categories', function () {
    $category = Category::all();
    return response()->json($category);
});

Route::get('category/{id}', function ($id) {

    $category = Category::where('id',$id)->first('id');
    
    $product = Product::where('category',$category->id)->orderBy('id','desc')->get();

    return response()->json($product);

});

Route::get('category/{id}', function ($id) {

    $category = Category::where('id',$id)->first('id');
    
    $product = Product::where('category',$category->id)->orderBy('id','desc')->get();

    return response()->json($product);

});

Route::get('product/{id}',function($id){
    $product = Product::where('id',$id)->get();
    return response()->json($product);
});

Route::get('faq',function(){
    $faq = SSS::all();
    return response()->json($faq);
});

Route::get('/socialmedia',function(){
    $socialmedia = Socialmedia::all();
    return response()->json($socialmedia);
});

Route::get('branch',function(){
    $branchs = Branch::all();
    return response()->json($branchs);
});

Route::get('brand',function(){
    $brand = Brand::all();
    return response()->json($brand);
});