<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Messages;

class MessageController extends Controller
{
    public function index(){

        $messages = Messages::all();

        return view('admin.message.message',compact('messages'));
    }

    public function read($id){

        $message = Messages::where('id',$id)->FirstOrFail();

        if($message->isRead == 0){
            Messages::where('id',$id)->update([
                'isRead'  =>  1
            ]);        
        }
        
        return view('admin.message.read',compact('message'));
    }


    public function delete($id){

        $message = Messages::where('id',$id);
        $message->delete();

        return redirect()->route('admin.message')->with('message','İşlem Başarıyla Gerçekleşti')->with('message_type','success');
    }

} 
