<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductDetail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{ 
     
    public function index(){
 
        $products = Product::with('getCategory')->with('getBrand')->get();

        return view('admin.product.product',compact('products'));
    }

    public function create(){

        $categories     =   Category::all();
        $brands         =   Brand::all();

        if(request()->isMethod('POST')){

            $this->validate(request(),[
                'name'      =>  'required',
                'code'      =>  'required',
                'category'  =>  'required',
                'brand'     =>  'required',
                'keyw'      =>  'required',
                'desc'      =>  'required',
                'editor1'   =>  'required',
                'price'     =>  'required',
                'quantity'  =>  'required',
                'country'  =>  'required',
                'colors'  =>  'required',
                'material'  =>  'required',
                'pattern'  =>  'required',
                'packQty'  =>  'required',
                'size'  =>  'required',
            ]);

            if(request()->hasFile('img')){

                $this->validate(request(),[
                    'img' => 'image|mimes:jpg,png,jpeg|max:2048',
                ]);

                $img = request()->file('img');

                $imgName = rand(0,999).'-'.time(). '.' . $img->extension();
    
                if($img->isValid()){

                    $img->move('assets/images/products/',$imgName);

                }
                Product::create([
                    'img'       =>  $imgName,
                    'name'      =>  request('name'),
                    'p_slug'      =>  Str::slug(request('name')),
                    'code'      =>  request('code'),
                    'category'  =>  request('category'),
                    'brand'     =>  request('brand'),
                    'keyw'      =>  request('keyw'),
                    'desc'      =>  request('desc'),
                    'content'   =>  request('editor1'),
                    'price'     =>  request('price'),
                    'quantity'  =>  request('quantity'),
                    'country'  =>  request('country'),
                    'colors'  =>  request('colors'),
                    'material'  =>  request('material'),
                    'pattern'  =>  request('pattern'),
                    'packQty'  =>  request('packQty'),
                    'size'  =>  request('size'),
                ]);

            }

            $product = Product::orderByDesc('id')->firstOrFail('id');

            $data = [
                'product' => $product->id
            ];

            if(request('featured')){
                $data['featured']=1;
            }else{
                $data['featured']=0;
            }
            ProductDetail::create($data);
            
            // // Telegram Bot Dosyasını Çalıştırır
            // $a = fopen('../node/app.js','a');
            // fwrite($a,' ');
            // fclose($a);
            // // Telegram Bot Dosyasını Çalıştırırq 

            //TELEGRAM
            if(request('telegram')){
                //Telegram Ürünü Otomatik Mesaj Atma
                $buttons =[
                    'inline_keyboard' => [
                        [   
                            [
                            'text' => 'Перейти на сайт',
                            'url' => 'https://bymmc.com.ua/'. request('category') . '/'. Str::slug(request('name')) .'/'.request('code')
                            ],
                            [
                            'text' => 'Напиши мне',
                            'url' => 'https://t.me/omer_uzer'
                            ]
                        ],
                        [
                            [
                            'text' => 'Заказ',
                            'url' => 'https://bymmc.com.ua/'.request('category').'/'.Str::slug(request('name')).'/'.request('code'),
                            ]
                        ],
                    ]
                ]; // // Gerçek ID -1001183135934
                //Telegram Ürünü Otomatik Mesaj Atma

                //Telegram Ürünü Otomatik Mesaj Atma
                Http::post('https://api.telegram.org/bot2064790826:AAF5xxxGH6sWbbLQt8Yc-7ptGX6VZ5um3og/sendPhoto',[
                    'chat_id' => 1841409766,
                    'photo' => 'https://bymmc.com.ua/assets/images/products/'.$imgName,
                    'caption'=> "🔥".request('name')."🔥 \n\n\n  код : ".request('code')." \n\n\n цвета : ". request('colors')." \n\n\n размеры : ".request('size') . " \n\n\n цена :  🔥 ".request('price')." грн 🔥 \n\n\n  цена за упаковку : \n🔥 ".request('price')*request('packQty')." грн 🔥",
                    'reply_markup' => json_encode($buttons),
                ]);
                //Telegram Ürünü Otomatik Mesaj Atma
            }



            return redirect()->route('admin.product')->with('message','İşlem Başarıyla Gerçekleşti')->with('message_type','success')->withInput();
        }

        return view('admin.product.create',compact('brands','categories'));
    }
   
    public function edit($slug){

        $product = Product::where('p_slug',$slug)->FirstOrFail();

        $categories = Category::all();

        $brands = Brand::all();

        $featured = ProductDetail::where('product',$product->id)->first();

        //dd($featured);


        return view('admin.product.edit',compact('product','categories','brands','featured'));
    }

    public function save($slug){

        $this->validate(request(),[
            'name'      =>  'required',
            'code'      =>  'required',
            'category'  =>  'required',
            'brand'     =>  'required',
            'keyw'      =>  'required',
            'desc'      =>  'required',
            'editor1'   =>  'required',
            'price'     =>  'required',
            'quantity'  =>  'required',
            'country'   =>  'required',
            'colors'    =>  'required',
            'material'  =>  'required',
            'pattern'   =>  'required',
            'packQty'   =>  'required',
            'size'      =>  'required',
        ]);

        
        $data = [
            'name'      =>  request('name'),
            'p_slug'      =>  Str::slug(request('name')),
            'code'      =>  request('code'),
            'category'  =>  request('category'),
            'brand'     =>  request('brand'),
            'keyw'      =>  request('keyw'),
            'desc'      =>  request('desc'),
            'content'   =>  request('editor1'),
            'price'     =>  request('price'),
            'quantity'  =>  request('quantity'),
            'country'  =>  request('country'),
            'colors'  =>  request('colors'),
            'material'  =>  request('material'),
            'pattern'  =>  request('pattern'),
            'packQty'  =>  request('packQty'),
            'size'  =>  request('size'),
        ];
        
        $product = Product::where('p_slug',$slug)->firstOrFail();

        if(request('featured') == 'on'){
            $detail['featured'] = 1;
        }else{
            $detail['featured'] = 0;
        }

                
        if(request()->hasFile('img')){
            $this->validate(request(),[
                'img'   => 'image|mimes:jpg,png,jpeg|max:2048',
            ]);

            $img    = request()->file('img');

            $imgName = rand(0,999).'-'.time(). '.' . $img->extension();

            if($img->isValid()){

                $delete = Product::where('p_slug',$slug)->firstOrFail();
                $trash  = $delete->img;
                $path   = 'assets/images/products/'. $trash;

                unlink($path); // Eski Resmi Dosyadan Siler

                $img->move('assets/images/products/',$imgName); // Yeni Resmi Dosyaya Yükler

                $data['img'] = $imgName;
            }
        }
        
        ProductDetail::where('product',$product->id)->update($detail);
        $product->update($data);


                    // //Telegram Ürünü Otomatik Mesaj Atma
                    // $buttons =[
                    //     'inline_keyboard' => [
                    //         [   
                    //             [
                    //             'text' => 'Перейти на сайт',
                    //             'url' => 'https://bymmc.com.ua/'. request('category') . '/'. Str::slug(request('name')) .'/'.request('code')
                    //             ],
                    //             [
                    //             'text' => 'Напиши мне',
                    //             'url' => 'https://t.me/omer_uzer'
                    //             ]
                    //         ],
                    //         [
                    //             [
                    //             'text' => 'Заказ',
                    //             'url' => 'https://bymmc.com.ua/'.request('category').'/'.Str::slug(request('name')).'/'.request('code'),
                    //             ]
                    //         ],
                    //     ]
                    // ];
                    // //Telegram Ürünü Otomatik Mesaj Atma
        
                    // //Telegram Ürünü Otomatik Mesaj Atma
                    // Http::post('https://api.telegram.org/bot2064790826:AAF5xxxGH6sWbbLQt8Yc-7ptGX6VZ5um3og/sendPhoto',[
                    //     'chat_id' => -1001183135934,
                    //     'photo' => 'https://bymmc.com.ua/assets/images/products/'.$imgName,
                    //     'caption'=> "🔥".request('name')."🔥 \n\n\n  код : ".request('code')." \n\n\n цвета : ". request('colors')." \n\n\n размеры : ".request('size') . " \n\n\n цена :  🔥 ".request('price')." грн 🔥 \n\n\n  цена за упаковку : \n🔥 ".request('price')*request('packQty')." грн 🔥",
                    //     'reply_markup' => json_encode($buttons),
                    // ]);
                    // //Telegram Ürünü Otomatik Mesaj Atma

        return redirect()->route('admin.product')->with('message','İşlem Başarıyla Gerçekleşti')->with('message_type','success');;

    }

    public function delete($slug){

        $delete = Product::where('p_slug',$slug)->firstOrFail();
        $trash  = $delete->img;
        
        $path   = 'assets/images/products/'.$trash;

        unlink($path); // Eski Resmi Dosyadan Siler

        $product = Product::where('p_slug',$slug)->firstOrFail();
        $product->delete();

        return redirect()->route('admin.product')->with('message','İşlem Başarıyla Gerçekleşti')->with('message_type','success');
    }
}