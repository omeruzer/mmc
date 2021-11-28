<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;

class ImageController extends Controller
{

    public function index($id){

        $product = Product::where('id',$id)->firstOrFail();

        $images = Image::where('product',$id)->get();

        return view('admin.product.image',compact('product','images'));
    }

    public function imgSave($id){


        if(request()->hasfile('img')){

            foreach(request()->file('img') as $img){

                $imgName = rand(0,999).'-'.time(). '.' . $img->extension();
    
                if($img->isValid()){
                    $img->move('assets\images\products',$imgName);
                }

                $save = Image::where('product',$id)->create([
                    'product' => $id,
                    'img' => $imgName
                ]);
            }

            if($save){
                return redirect()->back()->with('message','İşlem Başarıyla Gerçekleşti')->with('message_type','success');
            }

        }    
    }

    public function imgDel($id){

        $image = Image::where('id',$id)->first();

        $path   = 'assets/images/products/'.$image->img; 
        
        $delete = unlink($path);

        $image->delete();

        if($delete){
            return redirect()->back()->with('message','İşlem Başarıyla Gerçekleşti')->with('message_type','success');
        }
    }
}
