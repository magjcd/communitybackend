<?php

namespace App\Repositories\Interfaces;

interface PostRepositoryInterface {
    public function AddPost($data);
    public function ListPosts();
    public function ListPostsById($id);
    public function UpdatePost($data);
    public function DeletePost($id);
}