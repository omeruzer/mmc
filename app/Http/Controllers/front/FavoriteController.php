<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Favorite;
use App\Models\Product;
use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FavoriteController extends Controller
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
        
        if(!auth()->check()){
            return redirect()->route('login')->with('mesaj')->with('message','Favorilere eklediğiniz ürünleri görebilmek etmek giriş yapmanız gerekmektedir.')->with('message_type','warning');
        }

        $favorites = DB::table('favorites')->join('products','favorites.product','=','products.id')->select('*')->where('user',auth()->id())->orderByDesc('favorites.id')->get();
        return view('front.favorites.favorites',compact('favorites'));
    }

    public function add(){

        if(!auth()->check()){
            return redirect()->route('login')->with('mesaj')->with('message','Favorilere ürün eklemek için giriş yapmanız gerekmektedir.')->with('message_type','warning');
        }

        $product = Product::find(request('id'))->id;
        $user = Auth::id();
        
        $favorite = Favorite::create([
            'user' => $user,
            'product' => $product
        ]);

        if($favorite){
            return redirect()->route('favorites')->with('message','Транзакция выполнена успешно')->with('message_type','success');
        }
        
    }

    public function delete($id){

        if(!auth()->check()){
            return redirect()->route('login')->with('mesaj')->with('message','Favorilerden ürün kaldırmak için giriş yapmanız gerekmektedir.')->with('message_type','warning');
        }

        $delete = Favorite::where('product',$id)->where('user',auth()->id())->delete();

        if($delete){
            return redirect()->route('favorites')->with('message','Транзакция выполнена успешно')->with('message_type','success');
        }
    }
}
