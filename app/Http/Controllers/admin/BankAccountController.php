<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\BankAccount;
use Illuminate\Http\Request;

class BankAccountController extends Controller
{
    public function index(){

        $bankAccounts = BankAccount::all();

        return view('admin.bankaccount.bankaccount',compact('bankAccounts'));

    }

    public function create(){

        if(request()->isMethod('POST')){

            $this->validate(request(),[
                'bankName'      => 'required',
                'accountNumber' => 'required',
            ]);

            BankAccount::create([
                'bankName' => request('bankName'),
                'accountNumber' => request('accountNumber'),
            ]);

            return redirect()->route('admin.bankaccount')->with('message','İşlem Başarıyla Gerçekleşti')->with('message_type','success');;
        }

        return view('admin.bankaccount.create');
    }
   
    public function edit($id){
        $bankAccount = BankAccount::where('id',$id)->FirstOrFail();
        
        return view('admin.bankaccount.edit',compact('bankAccount'));
    }

    public function save($id){

        $this->validate(request(),[
            'bankName'      => 'required',
            'accountNumber' => 'required',
        ]);

        BankAccount::where('id',$id)->update([
            'bankName' => request('bankName'),
            'accountNumber' => request('accountNumber'),
        ]);

        return redirect()->route('admin.bankaccount')->with('message','İşlem Başarıyla Gerçekleşti')->with('message_type','success');;

    }

    public function delete($id){

        BankAccount::where('id',$id)->delete();


        return redirect()->route('admin.bankaccount')->with('message','İşlem Başarıyla Gerçekleşti')->with('message_type','success');
    }
}
