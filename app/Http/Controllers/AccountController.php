<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    private $account;

    public function __construct(Account $account_modal) {//checkboxで選択する１か２をvalueで送る
        $this->account = $account_modal;
    }

    public function store(Request $request){
        $request->validate([
            'choice' => 'required'
        ]);

        $ownBalance=[];
        if($request->choice == 1){
            $ownBalance = 10000;
        }else{
            $ownBalance = 7000;
        }

        $this->account->user_id = Auth::user()->id;
        $this->account->balance = $ownBalance;
        $this->account->save();

        // return 
    }
}
