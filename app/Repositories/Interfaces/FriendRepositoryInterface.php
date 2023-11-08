<?php
namespace App\Repositories\Interfaces;

interface FriendRepositoryInterface {
    public function AddFriend($data);
    public function ListFriend($id);
    public function ApproveFriend($friendId,$userid);
}