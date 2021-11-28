<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\TermsandConditions;
use Illuminate\Http\Request;

class TermsandConditionsController extends Controller
{
    public function index(){
        $termsAndConditions = TermsandConditions::find(1);

        return view('admin.termsandconditions.termsandconditions',compact('termsAndConditions'));
    }

    public function post(){
        $termsAndConditions = TermsandConditions::find(1)->update([
            'keyw'      => request('keyw'),
            'desc'      => request('desc'),
            'content'   => request('editor1'),
        ]);

        if($termsAndConditions){
            return redirect()->route('admin.terms.and.conditions')->with('message','İşlem Başarıyla Gerçekleşti')->with('message_type','success')->withInput();
        }
    }
}
