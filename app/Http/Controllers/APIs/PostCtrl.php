<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Database\QueryException;
use App\Http\Requests\PostReq;
use App\Repositories\Interfaces\PostRepositoryInterface;
use Illuminate\Support\Facades\Gate;

use App\Models\Post;

class PostCtrl extends Controller
{
    protected $PostRepositoryInterface;

    public function __construct(PostRepositoryInterface $PostRepositoryInterface){
        $this->PostRepositoryInterface = $PostRepositoryInterface;
    }

    // Add Post
    public function AddPost(PostReq $req){

        try {    
            $validated = $req->validated();
            if($validated){
                return $this->PostRepositoryInterface->AddPost($validated);
            }
        } catch (\Exception $e) {
            return getClass($e);
        }

    }

    // List all Posts
    public function ListPosts(){
        try {
            return $this->PostRepositoryInterface->ListPosts();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    // List Posts by ID
    public function ListPostsById($id){
        try {
            return $this->PostRepositoryInterface->ListPostsById($id);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    // Update Post
    public function UpdatePost(PostReq $req){
        try {    
            $this->PostRepositoryInterface->UpdatePost($req);
            return response()->success('post updated', null, 200);
        } catch (QueryException $e) {
            return response()->error('Check if Serve is running', 503);
        } catch (\Exception $e) {
            return $e;
        }
    }

    // Delete Post
    public function DeletePost($id, Post $post){
        try {
            // This gate allows the current user to delete the post if the current user added this post
            // if(Gate::allows('delete-post', $post)){
            //     abort(403);
            // }
            $this->PostRepositoryInterface->DeletePost($id);
            return response()->success('post deleted', null, 200);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
