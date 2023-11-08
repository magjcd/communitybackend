<?php

namespace App\Repositories;

use App\Repositories\Interfaces\SignupRepositoryInterface;

use App\Models\User;
use App\Jobs\SignUpClientJob;
use App\Jobs\SignUpVendorJob;

class SignupRepositoryClass implements SignupRepositoryInterface {

    public function SignUp($data) {

        $dataRes = [
            'name' => $data['full_name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'role_id' => $data['role_id'],
        ];

        User::create($dataRes);
        if(auth()->attempt(['email' => $data['email'],'password' => $data['password']])){
            $user = auth()->user();
            $token = $user->createToken('MyToken')->plainTextToken;

            // dispatch(new SignUpClientJob($data['name'],$data['email'],$data['password']));  
            // dispatch(new SignUpVendorJob($data['name'],$data['email']));  
            return response()->success($token,$user,201);
        }else{
            return response()->error('invalid information',401);
        }
    }

    public function ListUsers(){
        return User::all();
    }
}