<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Settings;
use Illuminate\Http\Request;

class LogoController extends Controller
{
    public function index(){

        $logo = Settings::firstOrFail();

        return view('admin.logo.logo',compact('logo'));
    }

    public function logo(){

        if(request()->hasFile('logo')){
            $this->validate(request(),[
                'logo' => 'image|mimes:jpg,png,jpeg|max:2048',
            ]);

            $logo = request()->file('logo');

            $logoName = rand(0,9999) . "-" . time() . "." . $logo->extension();

            if($logo->isValid()){

                $delete = Settings::where('id',1)->firstOrFail();
                $trash = $delete->logo;
                $path = 'assets/images/logo/'.$trash;

                unlink($path);

                $logo->move('assets/images/logo',$logoName);

                $logoupdate = Settings::where('id',1)->firstOrFail();
                $logoupdate->update([
                    'logo'  =>  $logoName
                ]);
            }

            return redirect()->route('admin.logo')->with('message','İşlem Başarıyla Gerçekleşti')->with('message_type','success');
        }

        if(request()->hasFile('favicon')){
            $this->validate(request(),[
                'favicon' => 'image|mimes:jpg,png,jpeg|max:2048',
            ]);

            $favicon = request()->file('favicon');

            $faviconName = rand(0,9999) . "-" . time() . "." . $favicon->extension();

            if($favicon->isValid()){

                $delete = Settings::find(1);
                $trash = $delete->favicon;
                $path = 'assets/images/logo/'.$trash;

                unlink($path);

                $favicon->move('assets/images/logo',$faviconName);

                $faviconupdate = Settings::find(1);
                $faviconupdate->update([
                    'favicon'  =>  $faviconName
                ]);
            }

            return redirect()->route('admin.logo')->with('message','İşlem Başarıyla Gerçekleşti')->with('message_type','success');
        }

    }

    public function favicon(){}
}
