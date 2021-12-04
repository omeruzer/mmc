<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Visitor;
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

        $product = htmlspecialchars(request('product'));
        $user = Auth::id();
        $comment = htmlspecialchars(request('comment'));

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

        if(!auth()->check()){
            return redirect()->route('login')->with('mesaj')->with('message','Вы должны войти в систему, чтобы просмотреть свои комментарии.')->with('message_type','warning');
        }

        $comments = Comment::with('getProduct')->where('comments.user',auth()->id())->orderByDesc('comments.id')->get();
        return view('front.comment.comment',compact('comments'));
    }

    public function detail($id){

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
        
        $comment = Comment::where('id',$id)->first();

        return view('front.comment.comment-detail',compact('comment'));
    }
}
