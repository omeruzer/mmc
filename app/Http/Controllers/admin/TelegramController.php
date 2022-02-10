<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class TelegramController extends Controller
{
    public function index($id){
        
        $product = Product::where('id',$id)->first();

        $buttons =[
            'inline_keyboard' => [
                [   
                    [
                    'text' => 'Перейти на сайт',
                    'url' => 'https://bymmc.com.ua/'. $product->category . '/'. $product->p_slug .'/'.$product->code
                    ],
                    [
                    'text' => 'Напиши мне',
                    'url' => 'https://t.me/omer_uzer'
                    ]
                ],
                // [
                //     [
                //     'text' => 'Заказ',
                //     'url' => 'https://bymmc.com.ua/'. $product->category . '/'. $product->p_slug .'/'.$product->code
                //     ]
                // ],
            ]
        ];

        $http = Http::post('https://api.telegram.org/bot2064790826:AAF5xxxGH6sWbbLQt8Yc-7ptGX6VZ5um3og/sendPhoto',[
            'chat_id' => 1841409766,
            'photo' => 'https://bymmc.com.ua/assets/images/products/'.$product->img,
            'caption'=> "🔥".$product->name."🔥 \n\n\n  код : ".$product->code." \n\n\n цвета : ". $product->colors." \n\n\n размеры : ".$product->size . " \n\n\n цена :  🔥 ".$product->price." грн 🔥 \n\n\n  цена за упаковку : \n🔥 ".$product->price*$product->packQty." грн 🔥",
            'reply_markup' => json_encode($buttons),
        ]);

        if($http){
            return redirect()->route('admin.product')->with('message','İşlem Başarıyla Gerçekleşti')->with('message_type','success');
        }
    }
}
