<?php

namespace App\Repositories;
use App\Repositories\Interfaces\PostRepositoryInterface;

use Illuminate\Support\Facades\DB;
use App\Models\Post;

class PostRepositoryClass implements PostRepositoryInterface {

    public function AddPost($data){
        $result = Post::create($data);
        $response = $result ? response()->success('post added',null,201) : response()->success('post could not be added',403);
        return $response;
    }
    
    public function ListPosts(){
        // return Post::with('users','comments')->get();
        return Post::with('users','comments')->get();
    }

    public function ListPostsById($id){
        $result = Post::with('users')->where('id',$id)->get();
        return $result;
    }

    public function UpdatePost($data){
        $id = $data['id'];
        $post_detail = $data['post_detail'];
        $user_id = $data['user_id'];

        Post::where('id',$id)->update([
            'post_detail' => $post_detail,
            'user_id' => $user_id
        ]);
    }

    public function DeletePost($id){
        Post::find($id)->delete();
    }
}