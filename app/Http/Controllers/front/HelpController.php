<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Messages;
use Illuminate\Http\Request;

class HelpController extends Controller
{
    public function index(){
        return view('front.help.help');
    }

    public function send(){
        if(request()->isMethod('POST')){
            $this->validate(request(),[
                'name'      => 'required',
                'subject'   => 'required',
                'email'     => 'required|email',
                'content'   => 'required'
            ]);

            $message = Messages::create([
                'name' => request('name'),
                'subject' => request('subject'),
                'email' => request('email'),
                'content' => request('content')
            ]);

            if($message){
                return redirect()->route('help');
            }
        }
    }
}
