<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Newsletter;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{

    public function index(){

        $emails = Newsletter::all();

        return view('admin.newsletter.newsletter',compact('emails'));

    }

    public function create(){

        if(request()->isMethod('POST')){

            $this->validate(request(),[
                'email' => 'required|email|unique:newsletter',
            ]);

            Newsletter::create([
                'email' => request('email'),
            ]);

            return redirect()->route('admin.newsletter')->with('message','İşlem Başarıyla Gerçekleşti')->with('message_type','success');;
        }

        return view('admin.newsletter.create');
    }
   
    public function edit($id){
        $email = Newsletter::where('id',$id)->FirstOrFail();
        
        return view('admin.newsletter.edit',compact('email'));
    }

    public function save($id){

        $this->validate(request(),[
            'email' => 'required|email|unique:newsletter',
        ]);

        Newsletter::where('id',$id)->update([
            'email' => request('email'),
        ]);

        return redirect()->route('admin.newsletter')->with('message','İşlem Başarıyla Gerçekleşti')->with('message_type','success');;

    }

    public function delete($id){

        Newsletter::where('id',$id)->delete();


        return redirect()->route('admin.newsletter')->with('message','İşlem Başarıyla Gerçekleşti')->with('message_type','success');
    }
}
