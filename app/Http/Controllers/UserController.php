<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    public function register(Request $request) {
        //create Uer
        $user=new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=bcrypt($request->password);
        $user->save();

        //create token
        $token=$user->createToken('authen_token',)->plainTextToken;

        $response=[
            'user'=>$user,
            'token'=>$token
        ];
        return response()->json($response);
    }
    
    public function login(Request $request) {

    }
    public function logout(Request $request) {

    }
}
