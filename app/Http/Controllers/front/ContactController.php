<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Messages;
use App\Models\Visitor;
use Illuminate\Http\Request;

class ContactController extends Controller
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

        $branchs = Branch::all();

        return view('front.contact.contact',compact('branchs'));
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
                return redirect()->route('contact')->with('message','Транзакция выполнена успешно')->with('message_type','success');;
            }
        }
    }
}
