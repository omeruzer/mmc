<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    
    public function add(){

        if(!auth()->check()){
            return redirect()->route('login')->with('mesaj')->with('message','Вы должны войти в систему, чтобы оставить комментарий.')->with('message_type','warning');
        }

        $this->validate(request(),[
            'name' => 'required',
            'comment' => 'required',
        ]);

        $product = request('product');
        $user = Auth::id();
        $comment = request('comment');

        $data = [
            'product' => $product,
            'user' => $user,
            'comment' => $comment
        ];

        $commentAdd = Comment::create($data);

        if($commentAdd){
            return redirect()->back()->with('message','Ваш комментарий был опубликован')->with('message_type','success');
        }

    }

    public function delete($id){


        $delete = Comment::where('id',$id)->delete();

        if($delete){
            return redirect()->back()->with('message','Ваш комментарий удален')->with('message_type','success');
        }

    }

    public function index(){

        if(!auth()->check()){
            return redirect()->route('login')->with('mesaj')->with('message','Вы должны войти в систему, чтобы просмотреть свои комментарии.')->with('message_type','warning');
        }

        $comments = Comment::with('getProduct')->where('comments.user',auth()->id())->orderByDesc('comments.id')->get();
        return view('front.comment.comment',compact('comments'));
    }

    public function detail($id){

        $comment = Comment::where('id',$id)->first();

        return view('front.comment.comment-detail',compact('comment'));
    }
}
