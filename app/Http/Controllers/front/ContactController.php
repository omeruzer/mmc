<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Messages;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){

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
                return redirect()->route('contact');
            }
        }
    }
}
