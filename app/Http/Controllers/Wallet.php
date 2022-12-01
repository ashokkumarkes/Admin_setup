<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Wallet as WalletAmount;
use App\Models\User;
class Wallet extends Controller
{
    public function index(){
        return view('wallet.index');
    }
    public function store(Request $request){
        $data = new WalletAmount;
        $user_id = User::where('email',$request->email)->first();
        $holder_type='App\Models\User';
        $uuid = Str::uuid()->toString();
        WalletAmount::create([
            'holder_type'=>$holder_type,
            'holder_id'=>$user_id->id,
            'name'=>'wallet',
            'slug'=>'slug',
            'uuid'=>$uuid,
            'balance'=>$request->amount
        ]);
        return back();
        // dd($request->all());
    }
}
