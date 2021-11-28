<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Comment; 
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function index(){

        $comments = Comment::with('getUser')->with('getProduct')->orderBy('id')->get();

        return view('admin.comment.comment',compact('comments'));
    }

    public function read($id){

        $comment = Comment::where('id',$id)->FirstOrFail();

        if($comment->isRead == 0){
            Comment::where('id',$id)->update([
                'isRead'  =>  1
            ]);        
        }
        
        return view('admin.comment.read',compact('comment'));
    }


    public function delete($id){

        Comment::where('id',$id)->delete();

        return redirect()->route('admin.comment')->with('message','İşlem Başarıyla Gerçekleşti')->with('message_type','success');
    }
}
