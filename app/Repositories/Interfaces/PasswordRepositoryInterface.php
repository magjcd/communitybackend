<?php
namespace App\Repositories\Interfaces;

interface PasswordRepositoryInterface {
    public function CheckSendEmail($email);
    public function ResetPwdOTP($otp);
}