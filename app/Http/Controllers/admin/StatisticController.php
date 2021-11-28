<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatisticController extends Controller
{
    public function index(){

        $productHits = Product::orderByDesc('hit')->take(10)->get();
        $productBads = Product::orderBy('hit')->take(10)->get();

        
        return view('admin.statistic.statistics',compact('productHits','productBads'));
    }
}
