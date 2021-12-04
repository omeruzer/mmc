<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Newsletter;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as FacadesValidator;

class NewsletterController extends Controller
{
    
    public function add(Request $request){
        
        $validate = FacadesValidator::make($request->all(),[
            'email' => 'required|email|unique:newsletter'
        ]);

        if ($validate->fails()) {
            return redirect()->route('help')->withErrors($validate)->withInput();
        }

        $email = htmlspecialchars(request('email'));

        $add = Newsletter::create([
            'email' => $email
        ]);

        if($add){
            return redirect()->route('help')->with('message','Транзакция выполнена успешно')->with('message_type','success');
        }else{
            return redirect()->route('help')->with('message','İşlem Sırasında Bir Sorun Gerçekleşti')->with('message_type','warning');
        }
    }
}
