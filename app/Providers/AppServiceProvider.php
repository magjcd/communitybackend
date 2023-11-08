<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Repositories\Interfaces\SignupRepositoryInterface;
use App\Repositories\SignupRepositoryClass;

use App\Repositories\Interfaces\PostRepositoryInterface;
use App\Repositories\PostRepositoryClass;

use App\Repositories\Interfaces\CommentRepositoryInterface;
use App\Repositories\CommentRepositoryClass;

use App\Repositories\Interfaces\PasswordRepositoryInterface;
use App\Repositories\PasswordRepositoryClass;

use App\Repositories\Interfaces\FriendRepositoryInterface;
use App\Repositories\FriendRepositoryClass;

use Response;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(SignupRepositoryInterface::class,SignupRepositoryClass::class);
        $this->app->bind(PostRepositoryInterface::class,PostRepositoryClass::class);
        $this->app->bind(CommentRepositoryInterface::class,CommentRepositoryClass::class);
        $this->app->bind(PasswordRepositoryInterface::class,PasswordRepositoryClass::class);
        $this->app->bind(FriendRepositoryInterface::class,FriendRepositoryClass::class);

        Response::macro('success', function($data,$additional = null, $status_code){
            return response()->json([
                'status' => true,
                'data' => $data,
                'additional' => $additional
            ],$status_code);
        });

        Response::macro('error', function($message,$status_code){
            return response()->json([
                'status' => false,
                'message' => $message
            ],$status_code);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
