<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    public function index(){

        $contact = Contact::find(1);

        return view('admin.contact.contact',compact('contact'));
    }

    public function post($id){
        
        $this->validate(request(),[
            'address'   =>  'required',
            'phone'     =>  'required',
            'email'     =>  'required',
            'keyw'     =>  'required',
            'desc'     =>  'required',
        ]);

        $contact = Contact::where('id',$id)->update([
            'address'   =>  request('address'),
            'phone'     =>  request('phone'),
            'email'     =>  request('email'),
            'keyw'     =>  request('keyw'),
            'desc'     =>  request('desc'),
        ]);

        return redirect()->route('admin.contact')->with('message','İşlem Başarıyla Gerçekleşti')->with('message_type','success');

    }

}
