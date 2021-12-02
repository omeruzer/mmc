<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Mail\NewOrderMail;
use App\Models\CartProduct;
use App\Models\Order;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PaymentController extends Controller
{

    public function index(){

        if(!auth()->check()){
            return redirect()->route('login')->with('mesaj')->with('message','Sepetinizde ki ürünleri sipariş etmek için giriş yapmanız gerekmektedir.')->with('message_type','warning');
        }elseif(count(Cart::content()) == 0){
            return redirect()->route('cart')->with('mesaj')->with('message','Ödeme yapmak için sepetinizde ürün bulunması gerekmektedir.')->with('message_type','warning');
        }

        $user = auth();

        return view('front.payment.payment',compact('user'));
    }

    public function toPay(){

        $this->validate(request(),[
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'address' => 'required',
            'city' => 'required',
            'country' => 'required',
            'shipping' => 'required',
        ]);

        $request = [
            'cart' => session('activeCartId'),
            'name'=> request('name'),
            'email'=> request('email'),
            'address'=> request('address'),
            'city' => request('city'),
            'postCode' => request('postCode'),
            'country' => request('country'),
            'phone' => request('phone'),
            'paymentType' => request('payment'),
            'shipping' => request('shipping'),
            'status'=> 'Siparişiniz Alındı',
            'orderAmount'=> request('cartTotal'),
        ];
        //dd($request['orderAmount']);
        $order = Order::create($request);


        $mailData = [
            'title' => '1 Yeni Siparişiniz Var!',
            'amount' => request('cartTotal'),
            'address' => request('address'),
            'city' => request('city'),
            'country' => request('country'),
            'postCode' => request('postCode'),
            'date' => $order->updated_at,
            'work' => 'Devler gibi eserler bırakmak için, karıncalar gibi çalışmak gerekir'
        ];

        $products = CartProduct::where('cart',session('activeCartId'))->get(['product','quantity']);

        foreach ($products as $product) {
            # code...
            $id = $product->product;
            $qty = $product->quantity;

            $productQty = Product::where('id',$id)->first()->quantity;

            $del = Product::where('id',$id)->update([
                'quantity' => ($productQty) - ($qty),
            ]);

        }

        
        Mail::to('omeruzer1021@gmail.com')->send(new NewOrderMail($mailData));

        Cart::destroy();
        session()->forget('activeCartId');

        if($order){
           return redirect()->route('confirm');

        }
        
    }
}
