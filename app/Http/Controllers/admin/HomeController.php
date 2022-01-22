<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Branch;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Messages;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{

    public function index(){    

            // // Telegram Bot Dosyasını Çalıştırır
            // $a = fopen('../node/app.js','a');
            // fwrite($a,' ');
            // fclose($a);
            // // Telegram Bot Dosyasını Çalıştırırq 

            // $buttons =[
            //     'inline_keyboard' => [
            //         [   
            //             [
            //             'text' => 'Web Sitesine Git',
            //             'url' => 'https://google.com'
            //             ],
            //             [
            //             'text' => 'Mesaj At',
            //             'url' => 'https://web.telegram.org/z/#1841409766'
            //             ]
            //         ],
            //         [
            //             [
            //             'text' => 'Sipariş Ver',
            //             'url' => 'https://bymmc.com.ua'
            //             ]
            //         ],
            //     ]
            // ];

            //dd(json_encode($buttons));

            // Http::post('https://api.telegram.org/bot2064790826:AAF5xxxGH6sWbbLQt8Yc-7ptGX6VZ5um3og/sendPhoto',[
            //     'chat_id' => -1001630273515,
            //     'photo' => 'https://i.pinimg.com/236x/98/5c/39/985c3996569e449d7dccf55ade348d62.jpg',
            //     'caption'=> "asdfsg\n dlskfdbg",
            // ]);

        
        // GENERAL DATA

        $userCount      =   User::count();
        $categoryCount  =   Category::count();
        $productCount   =   Product::count();
        $branchCount    =   Branch::count();
        $blogCount      =   Blog::count();
        $brandCount     =   Brand::count();
        $messageCount   =   Messages::where('isRead',0)->count();
        $managerCount   =   User::where('manager',1)->count();

        // DECLİNİNG STOCK DATA

        $decliningstocks = Product::where('quantity','<','20')->orderBy('quantity')->get();

        // VISITOR DATA

        $lastMonthVisitor   =   DB::select('SELECT DISTINCT ip FROM visitors WHERE created_at >= NOW() - INTERVAL 1 month');
        $lastWeekVisitor    =   DB::select('SELECT DISTINCT ip FROM visitors WHERE created_at >= NOW() - INTERVAL 7 day');
        $lastDayVisitor     =   DB::select('SELECT DISTINCT ip FROM visitors WHERE created_at >= NOW() - INTERVAL 1 day');

        // $ip         =   $_SERVER['REMOTE_ADDR'];
        // $language   =   substr($_SERVER['HTTP_ACCEPT_LANGUAGE'],0,2);
        // $url        =   $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
        // $browser    =   substr($_SERVER['HTTP_USER_AGENT'],0,12);

        // Visitor::create([
        //     'ip'            =>      $ip,
        //     'language'      =>      $language,
        //     'url'           =>      $url,
        //     'browser'       =>      $browser
        // ]);

        $visitors = Visitor::distinct('ip')->orderByDesc('id')->get();

        // NEW PRODUCT DATA

        $newProducts = Product::orderByDesc('id')->limit(10)->get(); 


        // ORDER

        $amount = Order::sum('orderAmount');

        $orderCount = Order::count();

        $truckOrder = Order::where('status','Заказ отправлен')->count();
        $endOrder = Order::where('status','заказ выполнен')->count();
        $NewOrder = Order::where('status','!=','Запрос на возврат создан')->where('isRead',0)->count();
        $WaitOrder = Order::where('status','!=','Запрос на возврат создан')->where('isRead',1)->count();
        $cancelOrder = Order::where('status','Заказ отменён')->count();
        $returnOrder = Order::where('status','Запрос на возврат создан')->count();

        return view('admin.home.home',compact('returnOrder','cancelOrder','WaitOrder','NewOrder','endOrder','truckOrder','orderCount','amount','userCount','categoryCount','productCount','branchCount','blogCount','brandCount','messageCount','managerCount','decliningstocks','visitors','lastMonthVisitor','lastWeekVisitor','lastDayVisitor','newProducts'));
    }

    public function visitorDelete(){

        Visitor::getQuery()->delete();

        return redirect()->back()->with('message','İşlem Başarıyla Gerçekleşti')->with('message_type','success');
    }
}
