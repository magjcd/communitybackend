<?php

namespace App\Repositories;
use App\Repositories\Interfaces\CommentRepositoryInterface;
use App\Models\Comment;

class CommentRepositoryClass implements CommentRepositoryInterface {
    
    public function AddComment($data){
        Comment::create($data);
    }

    public function UpdateComment($data){
        Comment::where('id',$data['id'])->update([
            'comment_detail' => $data['comment_detail']
        ]);
    }

    public function ListComments(){
        $response = Comment::with('comment_users')->get();
        return $response;
    }

    public function ListCommentById($id){
        $response = Comment::with('comment_users')->where('id',$id)->get();
        return $response;
    }

    public function DeleteComment($id){
        Comment::find($id)->delete();
    }
}
