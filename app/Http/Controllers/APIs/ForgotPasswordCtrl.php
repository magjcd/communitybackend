<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Repositories\Interfaces\PasswordRepositoryInterface;

use App\Jobs\ForgotPasswordJob;
use App\Models\User;

class ForgotPasswordCtrl extends Controller
{
    protected $PasswordRepositoryInterface;

    public function __construct(PasswordRepositoryInterface $PasswordRepositoryInterface){
        $this->PasswordRepositoryInterface = $PasswordRepositoryInterface;
    }

    public function CheckSendEmail(Request $req){
        return $this->PasswordRepositoryInterface->CheckSendEmail($req->email);
    }

    public function ResetPwdOTP(Request $req){
        try {
            return $this->PasswordRepositoryInterface->ResetPwdOTP($req->otp);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
