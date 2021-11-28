<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Truck;
use Illuminate\Http\Request;

class TruckController extends Controller
{
    public function index(){

        $truck = Truck::find(1);
        
        return view('admin.truck.truck',compact('truck'));
    }

    public function update(){
        $truck = Truck::find(1);

        $update = $truck->update([
            'track' => request('truck')
        ]);

        if($update){
            return redirect()->route('admin.truck')->with('message','İşlem Başarıyla Gerçekleşti')->with('message_type','success')->withInput();
        }
    }
}
