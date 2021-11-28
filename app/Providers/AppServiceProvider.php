<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Contact;
use App\Models\Messages;
use App\Models\Order;
use App\Models\Settings;
use App\Models\Socialmedia;
use App\Models\Truck;
use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        view()->share('set', Settings::find(1));
        view()->share('isReadMessageCount', Messages::where('isRead',0)->count());
        view()->share('isReadMessage', Messages::where('isRead',0)->orderBy('id','desc')->limit(3)->get());
        view()->share('isReadComment', Comment::with('getUser')->where('isRead',0)->orderBy('id','desc')->limit(3)->get());
        view()->share('isReadCommentCount', Comment::with('getUser')->where('isRead',0)->count());
        view()->share('cate', Category::orderBy ('title')->get());
        view()->share('cont',Contact::find(1));
        view()->share('socialMedias',Socialmedia::find(1));
        view()->share('isReadOrderCount', Order::where('isRead',0)->count());
        view()->share('isReadOrder', Order::where('isRead',0)->orderBy('id','desc')->limit(3)->get());
        view()->share('isReadReturnOrderCount', Order::where('status','İade Talebi Oluşturuldu')->count());
        view()->share('isReadReturnOrder', Order::where('status','İade Talebi Oluşturuldu')->orderBy('id','desc')->limit(3)->get());
        view()->share('shipp', Truck::find(1));
    }
}
