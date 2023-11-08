<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Repositories\Interfaces\SignupRepositoryInterface;
use App\Http\Requests\SignUpReq;

class UserCtrl extends Controller
{
    protected $SignupRepositoryInterface;

    public function __construct(SignupRepositoryInterface $SignupRepositoryInterface){
        $this->SignupRepositoryInterface = $SignupRepositoryInterface;
    }


    // Signing up a New User
    public function SignUp(SignUpReq $req){

        try {
            if($req->validated()){
                return $this->SignupRepositoryInterface->SignUp($req);
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    // Listing all registered Users
    public function ListUsers(){
        try {
            $data = $this->SignupRepositoryInterface->ListUsers();
            return response()->success($data,'null',200);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
