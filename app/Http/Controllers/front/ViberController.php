<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;

class ViberController extends Controller
{

    public function index($id){

        $a = Product::where('id', $id)->first();

        $http = Http::post('https://chatapi.viber.com/pa/send_message', [
            "auth_token" => "4ead3f9d78e7e029-792cd08d800f5402-c7d4541bf7b8e035",
            "receiver" => "7jEDGCYx+LDn7zWvvWqShA==",
            "type" => "picture",
            "text" => "🔥" . $a->name . "🔥 \n\n\n  код : " . $a->code . " \n\n\n цвета : " . $a->colors . " \n\n\n размеры : " . $a->size . " \n\n\n цена :  🔥 " . $a->price . " грн 🔥 \n\n\n  цена за упаковку : \n🔥 " . $a->price * $a->packQty . " грн 🔥",
            "media" => "https://bymmc.com.ua/assets/images/products/" . $a->img,
            "thumbnail" => "https://bymmc.com.ua/assets/images/products/" . $a->img,
            "keyboard" => [
                "Type" => "keyboard",
                "BgColor" => "#FFFFFF",
                "Buttons" => [
                    [
                        "Columns" => 3,
                        "Rows" => 1,
                        "BgColor" => "#3c93ea",
                        "BgMediaType" => "gif",
                        "BgMedia" => "http://bymmc.com.ua/" . $a->category . "/" . $a->p_slug . "/" . $a->code,
                        "BgLoop" => false,
                        "ActionType" => "open-url",
                        "ActionBody" => "http://bymmc.com.ua/" . $a->category . "/" . $a->p_slug . "/" . $a->code,
                        "Image" => "http://bymmc.com.ua/" . $a->category . "/" . $a->p_slug . "/" . $a->code,
                        "Text" => "<b>🌐 Web Sitesine Git</b>",
                        "TextVAlign" => "middle",
                        "TextHAlign" => "center",
                        "TextOpacity" => 60,
                        "TextSize" => "regular"
                    ],
                    [
                        "Columns" => 3,
                        "Rows" => 1,
                        "BgColor" => "#f4f43a",
                        "BgMediaType" => "gif",
                        "BgLoop" => false,
                        "ActionType" => "open-url",
                        "ActionBody" => "viber://chat?number=380634237504",
                        "Image" => "www.tut.by/img.jpg",
                        "Text" => "<b>✉️ Mesaj At</b>",
                        "TextVAlign" => "middle",
                        "TextHAlign" => "center",
                        "TextOpacity" => 60,
                        "TextSize" => "regular"
                    ],
                    [
                        "Columns" => 6,
                        "Rows" => 1,
                        "BgColor" => "#47C78E",
                        "BgMediaType" => "gif",
                        "BgLoop" => false,
                        "ActionType" => "open-url",
                        "ActionBody" => "https://bymmc.com.ua/viber/addcart/" . $a->id,
                        "Image" => "www.tut.by/img.jpg",
                        //"Text" => 'http://localhost:8000/asd',
                        "Text" => "<b>➕ Sepete " . $a->code . " Ekle  (" . $a->packQty . " Adet) Bedenler : (" . $a->size . ")</b>",
                        "TextVAlign" => "middle",
                        "TextHAlign" => "center",
                        "TextOpacity" => 60,
                        "TextSize" => "regular"
                    ],
                ]
            ]

        ]);

        return Redirect::to('viber://pa?chatURI=bymmcua&text=');
    }

    public function addCart($id){

        $a = Product::where('id', $id)->first();

        $b = [];

        array_push($b,['code' => $a->code,'packQty'=>$a->packQty,'price'=>$a->price]);

        
        $http = Http::post('https://chatapi.viber.com/pa/send_message', [
            "auth_token" => "4ead3f9d78e7e029-792cd08d800f5402-c7d4541bf7b8e035",
            "receiver" => "7jEDGCYx+LDn7zWvvWqShA==",
            "type" => "text",
            "text" =>  "🛒 ".$a->code . " Sepete Eklendi \n\n Sepetteki Ürünler: \n\n" . $b[0]['code'] ." => "  .$b[0]['packQty'] . " x " . $b[0]['price'] . " ₴ = " . $b[0]['packQty']*$b[0]['price']." ₴" ,
            "keyboard" => [
                "Type" => "keyboard",
                "BgColor" => "#FFFFFF",
                "Buttons" => [
                    [
                        "Columns" => 3,
                        "Rows" => 1,
                        "BgColor" => "#3c93ea",
                        "BgMediaType" => "gif",
                        "BgMedia" => "Siparişi Onayla",
                        "BgLoop" => false,
                        "ActionType" => "open-url",
                        "ActionBody" => "http://bymmc.com.ua/viber/order/".$a->id,
                        "Image" => "http://bymmc.com.ua/",
                        "Text" => "<b>✔️ Siparişi Onayla</b>",
                        "TextVAlign" => "middle",
                        "TextHAlign" => "center",
                        "TextOpacity" => 60,
                        "TextSize" => "regular"
                    ],
                    [
                        "Columns" => 3,
                        "Rows" => 1,
                        "BgColor" => "#ff0000",
                        "BgMediaType" => "gif",
                        "BgLoop" => false,
                        "ActionType" => "open-url",
                        "ActionBody" => "https://bymmc.com.ua/viber/orderpass/".$a->id,
                        "Image" => "www.tut.by/img.jpg",
                        "Text" => "<b>❌ Siparişi İptal Et</b>",
                        "TextVAlign" => "middle",
                        "TextHAlign" => "center",
                        "TextOpacity" => 60,
                        "TextSize" => "regular"
                    ],
                    [
                        "Columns" => 6,
                        "Rows" => 1,
                        "BgColor" => "#47C78E",
                        "BgMediaType" => "gif",
                        "BgLoop" => false,
                        "ActionType" => "open-url",
                        "ActionBody" => "https://bymmc.com.ua/viber/addcart/" . $a->id,
                        "Image" => "www.tut.by/img.jpg",
                        //"Text" => 'http://localhost:8000/asd',
                        "Text" => "<b>➕ Sepete " . $a->code . " Ekle  (" . $a->packQty . " Adet) Bedenler : (" . $a->size . ")</b>",
                        "TextVAlign" => "middle",
                        "TextHAlign" => "center",
                        "TextOpacity" => 60,
                        "TextSize" => "regular"
                    ],
                ]
            ]
        ]);

        return Redirect::to('viber://pa?chatURI=bymmcua&text=');
    }

    public function order($id){
        $http = Http::post('https://chatapi.viber.com/pa/send_message', [
            "auth_token" => "4ead3f9d78e7e029-792cd08d800f5402-c7d4541bf7b8e035",
            "receiver" => "7jEDGCYx+LDn7zWvvWqShA==",
            "type" => "text",
            "text" =>"✔️ Siparişiniz Onaylandı. \n\n 📞 Telefon Numaranı Verir Misin?" ,
            "keyboard" => [
                "Type" => "keyboard",
                "BgColor" => "#FFFFFF",
                "Buttons" => [
                    [
                        "Columns" => 6,
                        "Rows" => 1,
                        "BgColor" => "#47C78E",
                        "BgMediaType" => "gif",
                        "BgMedia" => "📞 Telefonu Paylaş",
                        "BgLoop" => false,
                        "ActionType" => "open-url",
                        "ActionBody" => "http://bymmc.com.ua/viber/phone/".$id,
                        "Image" => "http://bymmc.com.ua/viber/phone/",
                        "Text" => "<b>📞 Telefonu Paylaş</b>",
                        "TextVAlign" => "middle",
                        "TextHAlign" => "center",
                        "TextOpacity" => 60,
                        "TextSize" => "regular"
                    ]
                ]
            ]
        ]);

        return Redirect::to('viber://pa?chatURI=bymmcua&text=');
    }

    public function orderpass($id){ 
        $http = Http::post('https://chatapi.viber.com/pa/send_message', [
            "auth_token" => "4ead3f9d78e7e029-792cd08d800f5402-c7d4541bf7b8e035",
            "receiver" => "7jEDGCYx+LDn7zWvvWqShA==",
            "type" => "text",
            "text" =>"❌ Sepetiniz Boşaltıldı. Siparişiniz İptal Edildi." ,
        ]);

        return Redirect::to('viber://pa?chatURI=bymmcua&text=');
    }

    public function phone($id){
        $http = Http::post('https://chatapi.viber.com/pa/send_message', [
            "auth_token" => "4ead3f9d78e7e029-792cd08d800f5402-c7d4541bf7b8e035",
            "receiver" => "7jEDGCYx+LDn7zWvvWqShA==",
            "type" => "text",
            "text" =>"Siparişiniz Ve Bilgileriniz Alındı. En Kısa Sürede Size Dönüş Yapılacaktır. \n\n\n Bizi Tercih Ettiğiniz İçin Teşekkürler. " ,
        ]);

        return Redirect::to('viber://pa?chatURI=bymmcua&text=');
    }

    
}