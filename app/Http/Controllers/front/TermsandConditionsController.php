<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\TermsandConditions;
use Illuminate\Http\Request;

class TermsandConditionsController extends Controller
{
    public function index(){
        $termsandconditions = TermsandConditions::find(1);

        return view('front.termsandconditions.termsandconditions',compact('termsandconditions'));
    
    }

}
