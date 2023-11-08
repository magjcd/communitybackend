<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\APIs\UserCtrl;
use App\Http\Controllers\APIs\LoginCtrl;
use App\Http\Controllers\APIs\RoleCtrl;
use App\Http\Controllers\APIs\ForgotPasswordCtrl;

use App\Http\Controllers\APIs\PostCtrl;
use App\Http\Controllers\APIs\CommentCtrl;
use App\Http\Controllers\APIs\FriendCtrl;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('role',[RoleCtrl::class,'ListRoles']);

Route::post('signup',[UserCtrl::class,'SignUp']);
Route::post('login',[LoginCtrl::class,'Login']);
Route::post('forgotpwd',[ForgotPasswordCtrl::class,'CheckSendEmail']);
Route::post('otp',[ForgotPasswordCtrl::class,'ResetPwdOTP']);

Route::get('admin/listusers',[UserCtrl::class,'ListUsers']);

// Post Controller Group
Route::prefix('user/')->controller(PostCtrl::class)->group(function(){
    Route::post('addpost','AddPost');
    Route::get('listposts','ListPosts');
    Route::get('listpostsbyid/{id}','ListPostsById');
    Route::put('updatepost','UpdatePost');
    Route::delete('deletepost/{id}','DeletePost');
});

// Comment Controller Group
Route::prefix('user/')->controller(CommentCtrl::class)->group(function(){
    Route::post('addcomment','AddComment');
    Route::get('listcomments','ListComments');
    Route::get('listcommentbyid/{id}','ListCommentById');
    Route::put('updatecomment','UpdateComment');
    Route::delete('deletecomment/{id}','DeleteComment');
});

Route::prefix('/user')->controller(FriendCtrl::class)->group(function(){
    Route::post('addfriend','AddFriend');
    Route::get('listfriend/{id}','ListFriend');
    Route::post('acceptfriendreq/{frndid}/user/{userid}','ApproveFriend');
});