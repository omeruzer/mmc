<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BranchController extends Controller
{
    
    public function index(){

        $branchs = Branch::all();

        return view('admin.branch.branch',compact('branchs'));
    }

    public function create(){

        if(request()->isMethod('POST')){

            $this->validate(request(),[
                'name'      =>  'required',
                'address'   =>  'required',
                'phone'     =>  'required',
            ]);

            Branch::create([
                'name'      =>  request('name'),
                'address'   =>  request('address'),
                'phone'     =>  request('phone'),
                'slug'      =>  Str::slug(request('name'))
            ]);

            return redirect()->route('admin.branch')->with('message','İşlem Başarıyla Gerçekleşti')->with('message_type','success')->withInput();
        }

        return view('admin.branch.create');
    }
   
    public function edit($slug){
        $branch = Branch::where('slug',$slug)->FirstOrFail();
        //dd($branch);
        
        return view('admin.branch.edit',compact('branch'));
    }

    public function save($slug){

        $this->validate(request(),[
            'name'      =>  'required',
            'address'   =>  'required',
            'phone'     =>  'required',
        ]);

        $branch = Branch::where('slug',$slug)->firstOrFail();

        $branch->update([
            'name'      =>  request('name'),
            'address'   =>  request('address'),
            'phone'     =>  request('phone'),
            'slug'      =>  Str::slug(request('name'))
        ]);

        return redirect()->route('admin.branch')->with('message','İşlem Başarıyla Gerçekleşti')->with('message_type','success');;

    }

    public function delete($slug){
        $branch = Branch::where('slug',$slug);
        $branch->delete();

        return redirect()->route('admin.branch')->with('message','İşlem Başarıyla Gerçekleşti')->with('message_type','success');
    }

}
