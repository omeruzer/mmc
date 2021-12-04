<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{

    public function index(){

        $orders = Order::with('getCart')->where('status','!=','İade Talebi Oluşturuldu')->orderByDesc('id')->get();

        return view('admin.order.order',compact('orders'));
    }

    public function detail($id){

        $order = Order::find($id);

        if($order->isRead == 0){
            Order::where('id',$id)->update([
                'isRead'  =>  1 
            ]);        
        }

        $products = Order::with('getCart.cartProduct.getProducts')->whereHas('getCart', function($query){ $query->where('user', Auth::id()); })->where('orders.id',$id)->firstOrFail();

        return view('admin.order.order-detail',compact('order','products'));
    }

    public function save($id){
        
        $order = Order::find($id);

        $newStatus = request('status');

        $data = [
            'status' => $newStatus
        ];

        if(request()->has('trackCode')){

            $data['trackCode'] = request('trackCode');

        }

        Order::where('id',$id)->update($data);
        

        return redirect()->route('admin.order.detail',$order->id)->with('message','İşlem Başarıyla Gerçekleşti')->with('message_type','success');
        
        

    }

    public function backOrder(){

        $orders = Order::where('status','Запрос на возврат создан')->orderByDesc('id')->get();

        return view('admin.order.return-order',compact('orders'));
    }

    public function deleteOrder($id){

        $order = Order::where('id',$id)->delete();

        if($order){
            return redirect()->back()->with('message','İşlem Başarıyla Gerçekleşti')->with('message_type','success');
        }

    }

}
