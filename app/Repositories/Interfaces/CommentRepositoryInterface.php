<?php

namespace App\Repositories\Interfaces;

interface CommentRepositoryInterface {
    public function AddComment($data);
    public function UpdateComment($data);
    public function ListComments();
    public function ListCommentById($id);
    public function DeleteComment($id);
}