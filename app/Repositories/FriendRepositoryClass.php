<?php

namespace App\Repositories;
use App\Repositories\Interfaces\FriendRepositoryInterface;
use App\Models\Friend;

use Illuminate\Support\Facades\DB;

class FriendRepositoryClass implements FriendRepositoryInterface {

    public function AddFriend($data){
        $user_id = $data['user_id'];
        $friend_id = $data['friend_id'];

        $CheckExist = Friend::where([
            ['user_id', $user_id],
            ['friend_id', $friend_id]
        ])->get();

        $data = [
            'user_id' => $user_id,
            'friend_id' => $friend_id
        ];

        if(count($CheckExist) <= 0){
            $response = Friend::create($data);
            if($response){
                return response()->success('friend added',null,201);
            }else{
                return response()->error('friend could not be added',403);
            }
        }else{
            return response()->error('friend already',403);
        }
    }

    public function ListFriend($id){
        $response = Friend::with('friends')->where([
            ['user_id',$id],
            ['status','approved']
            ])->get();

        if($response){
            return response()->success($response,null,200);
        }else{
            return response()->success('no friends are available',403);
        }
    }

    public function ApproveFriend($friendId,$userid){
        $response = Friend::where([
            ['user_id',$userid],
            ['friend_id',$friendId]
            ])->update([
            'status' => 'approved'
            ]);
            return response()->success('frind now',null,200);
    }
}