<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AuthenticationController extends Controller
{
    //
    public function login(Request $request){
        $user = User::where('email',$request->email)->first();
        if($user){
            if($user->password == $request->password){
                $token = $user->createToken('Laravel Password Grant Client')->accessToken;
                $response = [
                  'token' => $token ,
                  'role_id' => $user->role_id,
                  'user_id' => $user->id ];
                return response($response , 200);
            } else{
                $response = 'password mismath';
                return response($response , 422);
            }
        } else{
            $response = 'user doesnt exist';
            return response($response , 422);
        }
    }
}
