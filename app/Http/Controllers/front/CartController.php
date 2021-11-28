<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\CartProduct;
use App\Models\Carts;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    public function index(){
        $shipping = 45;

        return view('front.cart.cart',compact('shipping'));
    }

    public function add(){

        if(Auth::check()){
            // OTURUM VARSA

            $quantity = request('qty');

            $productQty = Product::find(request('id'));

            $cartProduct = CartProduct::where('product',$productQty->id)->where('cart',session('activeCartId'))->first();
    
            $cartControl = CartProduct::where('cart',session('activeCartId'))->where('product',$productQty->id)->first();

            
            if($cartControl != null){

                // SEPETE DAHA ÖNCE EKLENMİŞ ÜRÜN
                
                $quantity = request('qty');
    
                $cartProductQty = $cartProduct->quantity;

                $qty = $quantity + $cartProductQty;
    
    
                if($qty <= $productQty->quantity){
                    // Sepete eklenmek istenen ürünle sepetteki ürünün sepetteki adediyle toplamı, ürün adedinden azsa ürünü sepete ekle
                    
                    if(Auth::check()){
    
                        $product = Product::find(request('id'));
        
                        $cartItem = Cart::add($product->id, $product->name, request('qty') , $product->price,['code'=>$product->code, 'slug'=>$product->slug , 'category' => $product->getCategory->slug,'img' => $product->img]);
    
                        $activeCartId = session('activeCartId');
                        if(!isset($activeCartId)){
                            $activeCart = Carts::create([
                                'user' => auth()->id()
                            ]);

                            $activeCartId = $activeCart->id;
                            session()->put('activeCartId',$activeCartId);
                        }
            
                        CartProduct::updateOrCreate(
                            ['cart' => $activeCartId , 'product' => $product->id],
                            ['quantity' => $cartItem->qty , 'amount' => $product->price , 'status' => 'Beklemede' ]
                        );
    
                        return redirect()->route('cart')->with('message','Ürün Sepete Eklendi')->with('message_type','success');
    
                    }
    
                }else{
                    // Sepete eklenmek istenen ürünle sepetteki ürünün sepetteki adediyle toplamı, ürünün adedinden çoksa ürünü sepete ekleme
                    return redirect()->route('cart')->with('message','Ürünün İstediğiniz Kadar Stoğu Yok')->with('message_type','warning');
                }
    
            }else{
                // SEPETE DAHA ÖNCE EKLENMEMİŞ ÜRÜN
    
                $quantity = request('qty');
    
                $productQuantity = $productQty->quantity;
    
                if($quantity <= $productQuantity){
                    
                    if(Auth::check()){
    
                        $product = Product::find(request('id'));
        
                        $cartItem = Cart::add($product->id, $product->name, request('qty') , $product->price,['code'=>$product->code, 'slug'=>$product->slug , 'category' => $product->getCategory->slug,'img' => $product->img]);
    
                        $activeCartId = session('activeCartId');
                        if(!isset($activeCartId)){
                            $activeCart = Carts::create([
                                'user' => auth()->id()
                            ]);
    
                            $activeCartId = $activeCart->id;
                            session()->put('activeCartId',$activeCartId);
                        }
            
                        CartProduct::updateOrCreate(
                            ['cart' => $activeCartId , 'product' => $product->id],
                            ['quantity' => $cartItem->qty , 'amount' => $product->price , 'status' => 'Beklemede' ]
                        );
    
                        return redirect()->route('cart')->with('message','Ürün Sepete Eklendi')->with('message_type','success');
    
    
                    }else{
    
                        $quantity = request('qty');
        
                        if($quantity <= $productQuantity){
    
                            $product = Product::find(request('id'));
        
                            $cartItem = Cart::add($product->id, $product->name, request('qty') , $product->price,['code'=>$product->code, 'slug'=>$product->slug , 'category' => $product->getCategory->slug,'img' => $product->img]);     
                           
                            return redirect()->route('cart')->with('message','Ürün Sepete Eklendi')->with('message_type','success');
    
                        }else{
                            return redirect()->route('cart')->with('message','Ürünün İstediğiniz Kadar Stoğu Yok')->with('message_type','warning');
                        }
    
                    }
            
                }else{
                    return redirect()->route('cart')->with('message','Ürünün İstediğiniz Kadar Stoğu Yok')->with('message_type','warning');
                }
            }

        }else{
            // OTURUM YOKSA 

            $product = Product::find(request('id'));

            $quantity = request('qty');

            $cart = Cart::content()->count();

            if($cart == 0){
                // Sepet Boşsa

                if($quantity <= $product->quantity){

                    $cartItem = Cart::add($product->id, $product->name, request('qty') , $product->price,['code'=>$product->code, 'slug'=>$product->slug , 'category' => $product->getCategory->slug,'img' => $product->img]);
    
                    if($cartItem){
                        return redirect()->route('cart')->with('message','Ürün Sepete Eklendi')->with('message_type','success');
                    }
    
                }else{
                    return redirect()->route('cart')->with('message','Ürünün İstediğiniz Kadar Stoğu Yok')->with('message_type','warning');
                }

            }else{

                // sepette ürün varsa

                $quantity = request('qty');
                
                $product = Product::find(request('id'));

                $rowId = Cart::content()->where('id',$product->id)->first();

                
                
                if(isset($rowId)){
                    // SEPETTE BU ÜRÜN VARSA
                    
                    $cart = Cart::content()->where('rowId',$rowId->rowId)->first();

                    $cartQty = $quantity + $cart->qty;
    
                    if($cartQty <= $product->quantity){
                        $cartItem = Cart::add($product->id, $product->name, request('qty') , $product->price,['code'=>$product->code, 'slug'=>$product->slug , 'category' => $product->getCategory->slug,'img' => $product->img]);
    
                        if($cartItem){
                            return redirect()->route('cart')->with('message','Ürün Sepete Eklendi')->with('message_type','success');
                        }
                        
                    }else{
                        return redirect()->route('cart')->with('message','Ürünün İstediğiniz Kadar Stoğu Yok')->with('message_type','warning');
                    }
                }else{
                    // SEPETTE BU ÜRÜN YOKSA

                    $quantity = request('qty');

                    $product = Product::find(request('id'));

                    if($quantity <= $product->quantity){
                        $cartItem = Cart::add($product->id, $product->name, request('qty') , $product->price,['code'=>$product->code, 'slug'=>$product->slug , 'category' => $product->getCategory->slug,'img' => $product->img]);
    
                        if($cartItem){
                            return redirect()->route('cart')->with('message','Ürün Sepete Eklendi')->with('message_type','success');
                        }

                    }else{
                        return redirect()->route('cart')->with('message','Ürünün İstediğiniz Kadar Stoğu Yok')->with('message_type','warning');
                    }
                }


                
                
            }
     





        }


    }

    public function delete($rowId){

        if(Auth::check()){
            $activeCartId = session('activeCartId');
            $cartitem = Cart::get($rowId);
            CartProduct::where('cart',$activeCartId)->where('product',$cartitem->id)->delete();
        }

        Cart::remove($rowId);
        
        return redirect()->route('cart')->with('mesaj','İşlem Başaryla Gerçekleşti')->with('mesaj_tur','success');
    }

    public function deleteAll(){

        if(Auth::check()){
            $activeCartId = session('activeCartId');
            CartProduct::where('cart',$activeCartId)->delete();
        }

        Cart::destroy();    

        return redirect()->route('cart')->with('mesaj','İşlem Başaryla Gerçekleşti')->with('mesaj_tur','success');

    }

    public function increase($rowId){

        if(Auth::check()){
            
            $activeCartId = session('activeCartId');
            $cartitem = Cart::get($rowId);
            $quantity = $cartitem->qty+4;

            $product = request('product');

            $productQty = Product::where('id',$product)->first()->quantity;

            if($quantity <= $productQty){
                CartProduct::where('cart',$activeCartId)->where('product',$cartitem->id)->update([
                    'quantity' => $quantity
                ]);
            }else{
                return redirect()->route('cart')->with('message','Ürünün İstediğiniz Kadar Stoğu Yok')->with('message_type','warning');
            }

        }

        $product = Cart::get($rowId);
        $qty     = $product->qty+4;
        $product = request('product');

        $productQty = Product::where('id',$product)->first()->quantity;

        if($qty <= $productQty){
            Cart::update($rowId,$qty);
            return redirect()->route('cart');
        }else{
            return redirect()->route('cart')->with('message','Ürünün İstediğiniz Kadar Stoğu Yok')->with('message_type','warning');
        }
    }

    public function decrease($rowId){

        if(Auth::check()){
            $activeCartId = session('activeCartId');
            $cartitem = Cart::get($rowId);
            $quantity = $cartitem->qty-4;

            if($quantity == 0){
                CartProduct::where('cart',$activeCartId)->where('product',$cartitem->id)->delete();
            }else{
                CartProduct::where('cart',$activeCartId)->where('product',$cartitem->id)->update([
                    'quantity' => $quantity
                ]); 
            }
        }

        $product = Cart::get($rowId);
        $qty     = $product->qty-4;
        Cart::update($rowId,$qty);
        return redirect()->route('cart');

    }

}