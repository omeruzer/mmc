<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\SSS;
use Illuminate\Http\Request;

class SSSController extends Controller
{

    public function index(){

        $questions = SSS::all();

        return view('admin.sss.sss',compact('questions'));
    }

    public function create(){

        if(request()->isMethod('POST')){
            $this->validate(request(),[
                'question' => 'required',
                'answer' => 'required'
            ]);
    
            $question = request('question');
            $answer = request('answer');
    
            $query = SSS::create([
                'question'  =>  $question,
                'answer'    =>  $answer
            ]);
    
            if($query){
                return redirect()->route('admin.sss')->with('message','İşlem Başarıyla Gerçekleşti')->with('message_type','success');
            }
        }

        return view('admin.sss.create');
    }
   
    public function edit($id){
        $sss = SSS::where('id',$id)->FirstOrFail();
        
        return view('admin.sss.edit',compact('sss'));
    }

    public function save($id){

        $this->validate(request(),[
            'question' => 'required',
            'answer' => 'required'
        ]);

        $sss = SSS::where('id',$id)->firstOrFail();

        $sss->update([
            'question' => request('question'),
            'answer' => request('answer'),
        ]);

        return redirect()->route('admin.sss')->with('message','İşlem Başarıyla Gerçekleşti')->with('message_type','success');;

    }

    public function delete($id){

        SSS::where('id',$id)->delete();

        return redirect()->route('admin.sss')->with('message','İşlem Başarıyla Gerçekleşti')->with('message_type','success');
    }
}
