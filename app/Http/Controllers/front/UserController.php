<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\CartProduct;
use App\Models\Carts;
use App\Models\LoginSeo;
use App\Models\RegisterSeo;
use App\Models\User;
use App\Models\Visitor;
use Dotenv\Validator;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator as FacadesValidator;

class UserController extends Controller
{
    
    public function loginForm(){

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
        
        $seo = LoginSeo::find(1);

        return view('front.login.login',compact('seo'));
    }

    public function login(){
        $this->validate(request(),[
            'email'     => 'required|email',
            'password'  => 'required'
        ]);

        $credentials = [

            'email' => request('email'),
            'password' => request('password'),
            'active' => 1

        ];

        if(Auth::attempt($credentials)){
            request()->session()->regenerate();

            Cart::destroy();

            return redirect()->intended('/');
        }else{
            $errors = ['email' => 'Электронная почта или пароль неверный'];
            return back()->withErrors($errors)->withInput();
        }


    }

    public function register(){

        $rules = FacadesValidator::make(request()->all(),[
            'name' => 'required|min:5|max:60',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:5|max:15'
        ]);

        if($rules->fails()){
            return redirect()->route('register.form')->withErrors($rules)->withInput();
        }

        $name    =   request('name');
        $email      =   request('email');
        $password      =   request('password');

        $user = User::create([

            'name'               =>  $name,
            'email'                 =>  $email,
            'password'             =>  Hash::make($password),
            'active'               =>  1,
            'manager'               =>  0
            
        ]);
        Auth::login($user);

        return redirect()->route('homepage');
    }

    public function logout(){

        Auth::logout();
        request()->session()->flush();
        request()->session()->regenerate();
        return redirect()->route('homepage');

    }
    
}
