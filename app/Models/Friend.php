<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    use HasFactory;

    public function friends(){
        return $this->hasMany(User::class,'id','friend_id');
    }

    public function userhimself(){
        return $this->hasMany(User::class,'id','user_id');
    }

    protected $fillable = [
        'user_id',
        'friend_id'
    ];
}
