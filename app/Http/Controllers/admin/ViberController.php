<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ViberCart;
use App\Models\ViberCartProduct;
use App\Models\ViberOrder;
use Illuminate\Http\Request;

class ViberController extends Controller
{
    public function index(){

        $orders = ViberOrder::all();
        

        return view('admin.viber.viber',compact('orders'));
    }

    public function detail($id){
        $order = ViberOrder::where('id',$id)->first();

        $cartproduct = ViberCartProduct::where('id',$order->viber_cart_product)->first();

        $products = Product::where('id',$cartproduct->product_id)->get();

        return view('admin.viber.viber-detail',compact('order',"products"));
    }

    public function delete($id){
        ViberOrder::where('id',$id)->delete();

        return redirect()->route('admin.viber')->with('message','İşlem Başarıyla Gerçekleşti')->with('message_type','success')->withInput();
    }
}
