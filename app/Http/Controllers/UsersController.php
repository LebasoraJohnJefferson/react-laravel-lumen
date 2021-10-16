<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Users;
class UsersController extends Controller
{
    //
    public function createUser(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required'
        ]);

        $user = new Users();
        $user->name=$request->input('name');
        $user->email=$request->input('email');
        $user->password=$request->input('password');
        $user->save();
        return response()->json($user,200);
    }

    public function userLogin(Request $request){
        $this->validate($request,[
            'email'=>'required|email',
            'password'=>'required'
        ]);

        $user_auth = DB::table('users')
        ->select('*')
        ->where('email',$request->input('email'))
        ->where('password',$request->input('password'))
        ->get();
        return response()->json($user_auth);

    }
}
