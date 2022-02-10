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
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Paragraf\ViberBot\Event\MessageEvent;
use Paragraf\ViberBot\Model\ViberUser;
use Paragraf\ViberBot\TextMessage;
use Viber\Api\Sender;
use Viber\Bot;
use Viber\Client;


class HomeController extends Controller
{

    public function index()
    {

        // GENERAL DATA

        $userCount      =   User::count();
        $categoryCount  =   Category::count();
        $productCount   =   Product::count();
        $branchCount    =   Branch::count();
        $blogCount      =   Blog::count();
        $brandCount     =   Brand::count();
        $messageCount   =   Messages::where('isRead', 0)->count();
        $managerCount   =   User::where('manager', 1)->count();

        // DECLİNİNG STOCK DATA

        $decliningstocks = Product::where('quantity', '<', '20')->orderBy('quantity')->get();

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

        $truckOrder = Order::where('status', 'Заказ отправлен')->count();
        $endOrder = Order::where('status', 'заказ выполнен')->count();
        $NewOrder = Order::where('status', '!=', 'Запрос на возврат создан')->where('isRead', 0)->count();
        $WaitOrder = Order::where('status', '!=', 'Запрос на возврат создан')->where('isRead', 1)->count();
        $cancelOrder = Order::where('status', 'Заказ отменён')->count();
        $returnOrder = Order::where('status', 'Запрос на возврат создан')->count();

        return view('admin.home.home', compact('returnOrder', 'cancelOrder', 'WaitOrder', 'NewOrder', 'endOrder', 'truckOrder', 'orderCount', 'amount', 'userCount', 'categoryCount', 'productCount', 'branchCount', 'blogCount', 'brandCount', 'messageCount', 'managerCount', 'decliningstocks', 'visitors', 'lastMonthVisitor', 'lastWeekVisitor', 'lastDayVisitor', 'newProducts'));
    }

    public function visitorDelete()
    {

        Visitor::getQuery()->delete();

        return redirect()->back()->with('message', 'İşlem Başarıyla Gerçekleşti')->with('message_type', 'success');
    }
}
