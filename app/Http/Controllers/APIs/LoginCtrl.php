<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\LoginReq;
use App\Models\User;

class LoginCtrl extends Controller
{
    public function Login(LoginReq $req){
        $validate = $req->validated();
        if($validate){
            if(auth()->attempt($validate)){
                $user = auth()->user();
                $token = $user->createToken('MyToken')->plainTextToken;
                return response()->success($token,$user,200);
            }else{
                return response()->error('invalid credentials',401);
            }
        }
    }
}
