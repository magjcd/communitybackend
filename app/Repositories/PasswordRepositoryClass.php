<?php
namespace App\Repositories;
use App\Repositories\Interfaces\PasswordRepositoryInterface;
use App\Models\User;
use App\Jobs\ForgotPasswordJob;

class PasswordRepositoryClass implements PasswordRepositoryInterface {
    
    public function CheckSendEmail($email){
        $CheckEmail = User::where('email',$email)->first();
        if($CheckEmail){
            $otp = rand(000000,999999);
            User::where('email',$email)
            ->update([
                'otp' => $otp
            ]);
            dispatch(new ForgotPasswordJob($email,$otp));
            return response()->success('an email has been sent at '.$email,null,200);
        }else{
            return response()->error('invalid email address',403);
        }
    }

    public function ResetPwdOTP($otp){
        $otpres = User::where('otp',$otp)->first();
        if($otpres){
            User::where('otp',$otp)->update([
                'password' => bcrypt('12345678')
            ]);
            return response()->success('password is updated as 12345678',null,200);
        }else{
            return response()->error('incorrect OTP',403);
        }
    }
}