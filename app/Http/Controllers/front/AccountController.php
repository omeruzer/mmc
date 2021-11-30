<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{

    public function index(){
        
        if(!auth()->check()){
            return redirect()->route('login')->with('mesaj')->with('message','Вам необходимо войти на страницу моего профиля.')->with('message_type','warning');
        }

        return view('front.account.account');
    }

    public function userAccount(){

        $user = User::where('id',auth()->id())->get();

        return view('front.account.user-account',compact('user'));
    }

    public function userAccountPost(){
        $this->validate(request(),[
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required',
        ]);

        $data = [
            'name' => request('name'),
            'email' => request('email'),
            'phone' => request('phone'),
        ];

        $save = User::where('id',auth()->id())->update($data);

        if($save){
            return redirect()->route('user-account')->with('message','Транзакция выполнена успешно')->with('message_type','success');
        }
    }

    public function passwordAccount(){
        return view('front.account.password-account');
    }
    
    public function passwordAccountPost(){

        $this->validate(request(),[
            'password' => 'required',
            'newPassword' => 'required|confirmed|min:5|max:15',
        ]);

        $pass = request('password');

        $newPass = request('newPassword');

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

        $address = User::where('id',auth()->id())->get();

        return view('front.account.address-account',compact('address'));
    }

    public function addressAccountPost(){
        $this->validate(request(),[
            'address' => 'required',
            'country' => 'required',
            'city' => 'required',
            'postCode' => 'required',
        ]);

        $data = [
            'address' => request('address'),
            'country' => request('country'),
            'city' => request('city'),
            'postCode' => request('postCode'),
        ];

        $save = User::where('id',auth()->id())->update($data);

        if($save){
            return redirect()->route('address-account')->with('message','Транзакция выполнена успешно')->with('message_type','success');
        }
    }

}
