<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\FriendReq;
use App\Repositories\Interfaces\FriendRepositoryInterface;

class FriendCtrl extends Controller
{
    protected $FriendRepositoryInterface;
    public function __construct(FriendRepositoryInterface $FriendRepositoryInterface){
        $this->FriendRepositoryInterface = $FriendRepositoryInterface;
    }

    public function AddFriend(FriendReq $req){
        try {
            return $this->FriendRepositoryInterface->AddFriend($req);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function ListFriend($id){
        return $this->FriendRepositoryInterface->ListFriend($id);
    }

    public function ApproveFriend($friendId,$userid){
        return $this->FriendRepositoryInterface->ApproveFriend($friendId,$userid);
    }
}
