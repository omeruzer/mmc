<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
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
            return redirect()->route('login')->with('mesaj')->with('message','Вам необходимо войти на страницу моего профиля.')->with('message_type','warning');
        }

        return view('front.account.account');
    }

    public function userAccount(){

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

        $user = User::where('id',auth()->id())->get();

        return view('front.account.user-account',compact('user'));
    }

    public function userAccountPost(){

        

        $this->validate(request(),[
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
        ]);

        $data = [
            'name' => htmlspecialchars(request('name')),
            'email' => htmlspecialchars(request('email')),
            'phone' => htmlspecialchars(request('phone')),
        ];

        $save = User::where('id',auth()->id())->update($data);

        if($save){
            return redirect()->route('user-account')->with('message','Транзакция выполнена успешно')->with('message_type','success');
        }
    }

    public function passwordAccount(){

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

        return view('front.account.password-account');
    }
    
    public function passwordAccountPost(){

        $this->validate(request(),[
            'password' => 'required',
            'newPassword' => 'required|confirmed|min:5|max:15',
        ]);

        $pass = htmlspecialchars(request('password'));

        $newPass = htmlspecialchars(request('newPassword'));

        $password = User::where('id',auth()->id())->firstOrCreate();

        
        if(Hash::check($pass, $password->password)){

            $passUpdate = User::where('id',auth()->id())->update([
                'password' => Hash::make($newPass)
            ]);

            if($passUpdate){
                return redirect()->route('password-account')->with('message','Транзакция выполнена успешно')->with('message_type','success');
            }
        }else{
            return redirect()->route('password-account')->with('message','ваш старый пароль неправильный')->with('message_type','danger');
        }

    }

    public function addressAccount(){

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

        $address = User::where('id',auth()->id())->get();

        return view('front.account.address-account',compact('address'));
    }

    public function addressAccountPost(){
        $this->validate(request(),[
            'address'   => 'required',
            'city'      => 'required',
        ]);

        $data = [
            'address'   => htmlspecialchars(request('address')),
            'city'      => htmlspecialchars(request('city')),
        ];

        $save = User::where('id',auth()->id())->update($data);

        if($save){
            return redirect()->route('address-account')->with('message','Транзакция выполнена успешно')->with('message_type','success');
        }
    }

}
