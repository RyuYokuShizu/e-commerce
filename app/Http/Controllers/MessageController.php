<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use Psy\CodeCleaner\ReturnTypePass;

class MessageController extends Controller
{
    private $message;

    public function __construct(Message $message_model) {
        $this->message= $message_model;
    }
 

    //userはadminとだけ。adminはよこにuser一覧を表示させてそれぞれとコンタクトが取れる。
    
    public function  store(Request $request, $id){ 
        $request->validate([
            'message' => 'required'
        ]);

        $this->message->sender_id = Auth::user()->id;
        $this->message->receiver_id = $id;
        $this->message->message = $request->message;
        $this->message->save();

        // return redirect()->route('',['id' =>$id]);


    }
}
