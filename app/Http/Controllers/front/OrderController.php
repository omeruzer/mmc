<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
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
            return redirect()->route('login')->with('mesaj')->with('message','Siparişlerinizi Görebilmek için giriş yapmanız gerekmektedir.')->with('message_type','warning');
        }

        $orders = Order::with('getCart')->whereHas('getCart', function($query){ $query->where('user', Auth::id()); })->orderByDesc('created_at')->get();

        $shipping = 45; 

        return view('front.myorders.myorders',compact('orders','shipping'));
    }

    public function detail($id){

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
            return redirect()->route('login')->with('mesaj')->with('message','Siparişlerinizi Görebilmek için giriş yapmanız gerekmektedir.')->with('message_type','warning');
        }

        $orders = Order::with('getCart.cartProduct.getProducts')->whereHas('getCart', function($query){ $query->where('user', Auth::id()); })->where('orders.id',$id)->firstOrFail();

        return view('front.myorders.myordersdetail',compact('orders'));
    }

    public function returnOrder($id){

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

        $order = Order::where('id',$id)->update([
            'status' => 'Запрос на возврат создан'
        ]);

        if($order){
            return redirect()->back()->with('message','Запрос на возврат создан.')->with('message_type','warning');
        }  

    }

    public function backOrder(){

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

        $orders = Order::with('getCart')->whereHas('getCart', function($query){ $query->where('user', Auth::id()); })->orderByDesc('created_at')->where('status','İade Talebi Oluşturuldu')->get();

        return view('front.myorders.return-myorders',compact('orders'));
    }
}
