<?php

namespace App\Repositories\Interfaces;

interface SignupRepositoryInterface {
    
    public function SignUp($data);
    public function ListUsers();
}