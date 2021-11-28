<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{

    public function index(){

        if(!auth()->check()){
            return redirect()->route('login')->with('mesaj')->with('message','Siparişlerinizi Görebilmek için giriş yapmanız gerekmektedir.')->with('message_type','warning');
        }

        $orders = Order::with('getCart')->whereHas('getCart', function($query){ $query->where('user', Auth::id()); })->orderByDesc('created_at')->get();

        $shipping = 45; 

        return view('front.myorders.myorders',compact('orders','shipping'));
    }

    public function detail($id){

        if(!auth()->check()){
            return redirect()->route('login')->with('mesaj')->with('message','Siparişlerinizi Görebilmek için giriş yapmanız gerekmektedir.')->with('message_type','warning');
        }

        $orders = Order::with('getCart.cartProduct.getProducts')->whereHas('getCart', function($query){ $query->where('user', Auth::id()); })->where('orders.id',$id)->firstOrFail();

        return view('front.myorders.myordersdetail',compact('orders'));
    }

    public function returnOrder($id){

        $order = Order::where('id',$id)->update([
            'status' => 'İade Talebi Oluşturuldu'
        ]);

        if($order){
            return redirect()->back()->with('message','İade Talebi Oluşturuldu.')->with('message_type','warning');
        }  

    }

    public function backOrder(){

        $orders = Order::with('getCart')->whereHas('getCart', function($query){ $query->where('user', Auth::id()); })->orderByDesc('created_at')->where('status','İade Talebi Oluşturuldu')->get();

        return view('front.myorders.return-myorders',compact('orders'));
    }
}
