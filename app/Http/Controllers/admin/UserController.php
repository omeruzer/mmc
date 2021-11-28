<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{

    public function login(){

            if(request()->isMethod('POST')){
                $this->validate(request(),[
                    'email' => 'required|email',
                    'password' => "required"
                ]);
    
                $credentials = [
                    'email' => request('email'),
                    'password' => request('password'),
                    'manager' => 1,
                    'active' => 1
                ];
        
                if(Auth::attempt($credentials)){
                    return redirect()->route('admin.home');
                }else{
                    return redirect()->back()->withErrors([
                        'email' => 'E-mail veya Şifre Hatalı!'
                    ])->withInput();
                }
            }
    

        return view('admin.login.login');
    }

    public function logout(){
        Auth::logout();
        request()->session()->flush();
        request()->session()->regenerate();
        return redirect()->route('admin.login');
    }

    public function index(){
        
        $users = User::all();

        return view('admin.user.user',compact('users'));
    }

    public function create(){

        if(request()->isMethod('POST')){

            $this->validate(request(),[
                'name'      => 'required',
                'email'     => 'required|email',
                'password'  => 'required|confirmed',
            ]);

            $data = [
                'name'      => request('name'),
                'email'     => request('email'),
                'password'  => Hash::make(request('password')),
                'address'   => request('address'),
                'phone'     => request('phone'),
                'city'     => request('city'),
                'country'     => request('country'),
                'postCode'     => request('postCode'),
            ];

            if(request('active')){
                $data['active']=1;
            }else{
                $data['active']=0;
            }

            if(request('manager')){
                $data['manager']=1;
            }else{
                $data['manager']=0;
            }

            User::create($data);

            return redirect()->route('admin.user')->with('message','İşlem Başarıyla Gerçekleşti')->with('message_type','success')->withInput();
        }

        return view('admin.user.create');
    }
   
    public function edit($id){
        $user = User::where('id',$id)->FirstOrFail();
        //dd($category);
        
        return view('admin.user.edit',compact('user'));
    }

    public function save($id){

        $this->validate(request(),[
            'name'      =>  'required',
            'email'     =>  'required|email',
            'password'  =>  'required|confirmed',
        ]);

        $data = [
            'name'      =>  request('name'),
            'email'     =>  request('email'),
            'password'  =>  Hash::make(request('password')),
            'address'   =>  request('address'),
            'phone'     =>  request('phone'),
            'city'     => request('city'),
            'country'     => request('country'),
            'postCode'     => request('postCode'),
        ];

        if(request('active') == 'on'){
            $data['active'] = 1;
        }else{
            
            $data['active'] = 0;
        }
        
        if(request('manager')== 'on'){
            $data['manager'] = 1;
        }else{
            
            $data['manager'] = 0;
        }
        

        $user = User::where('id',$id)->update($data);

        return redirect()->route('admin.user')->with('message','İşlem Başarıyla Gerçekleşti')->with('message_type','success');;

    }

    public function delete($id){
        $category = User::find($id);
        $category->delete();

        return redirect()->route('admin.user')->with('message','İşlem Başarıyla Gerçekleşti')->with('message_type','success');
    }

}
