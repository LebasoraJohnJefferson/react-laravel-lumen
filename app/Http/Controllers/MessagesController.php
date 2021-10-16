<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MessagesController extends Controller
{
    //
    public function getAllMessage(){
        $messages = DB::table('messages')
        ->select('messages.user_id','name','message_id','messages')
        ->join('users','users.user_id','messages.user_id')
        ->orderBy('message_id','desc')
        ->get();
        return response()->json($messages);
    }

    public function createMessages(Request $request){
        $this->validate($request,[
            'user_id'=>'required',
            'messages'=>'required',
        ]);
        
        $message = new Messages();
        $message->user_id=$request->input('user_id');
        $message->messages=$request->input('messages');
        $message->save();
        return response()->json('successfully created new message',200);
    }
}
