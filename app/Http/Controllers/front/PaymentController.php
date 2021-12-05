<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Mail\NewOrderMail;
use App\Models\BankAccount;
use App\Models\CartProduct;
use App\Models\Order;
use App\Models\Product;
use App\Models\Visitor;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PaymentController extends Controller
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
            return redirect()->route('login')->with('mesaj')->with('message','Вы должны войти в систему, чтобы заказать товары в корзине.')->with('message_type','warning');
        }elseif(count(Cart::content()) == 0){
            return redirect()->route('cart')->with('mesaj')->with('message','Для оплаты у вас должен быть товар в корзине.')->with('message_type','warning');
        }

        $user = auth();

        $bank = BankAccount::inRandomOrder()->first();

        return view('front.payment.payment',compact('user','bank'));
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
            'name'=> htmlspecialchars(request('name')),
            'email'=> htmlspecialchars(request('email')),
            'address'=> htmlspecialchars(request('address')),
            'city' => htmlspecialchars(request('city')),
            'postCode' => htmlspecialchars(request('postCode')),
            'country' => htmlspecialchars(request('country')),
            'phone' => htmlspecialchars(request('phone')),
            'paymentType' => request('payment'),
            'shipping' => request('shipping'),
            'status'=> 'заказ принят',
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
