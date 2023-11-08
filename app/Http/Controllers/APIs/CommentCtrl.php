<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Repositories\Interfaces\CommentRepositoryInterface;
use App\Http\Requests\CommentReq;

class CommentCtrl extends Controller
{
    protected $CommentRepositoryInterface;
    public function __construct(CommentRepositoryInterface $CommentRepositoryInterface){
        $this->CommentRepositoryInterface = $CommentRepositoryInterface;
    }

    public function AddComment(CommentReq $req){
        try {
            if($req->validated()){
                $this->CommentRepositoryInterface->AddComment($req->validated());
                return response()->success('comment added',null,201);
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function UpdateComment(CommentReq $req){
        try {
            $this->CommentRepositoryInterface->UpdateComment($req);
            return response()->success('comment updated',null,200);
        } catch (\Exception $e) {
            return $e->getMessage();
        }

    }

    public function ListComments(){
        try {
            return $this->CommentRepositoryInterface->ListComments();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function ListCommentById($id){
        try {
            return $this->CommentRepositoryInterface->ListCommentById($id);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function DeleteComment($id){
        try {
            $this->CommentRepositoryInterface->DeleteComment($id);
            return response()->success('comment deleted',null,200);
        } catch (\Exception $e) {
            return $e->getMessage();
        }

    }
}
