<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('like_dislikes', function (Blueprint $table) {

            $table->bigIncrements('id')->unsigned();
            $table->bigInteger('post_id')->unsigned();
            $table->bigInteger('comment_id')->unsigned();
            $table->bigInteger('nested_comment_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();


            $table->integer('likes')->unsigned();
            $table->integer('dis_likes')->unsigned();


            $table->foreign('post_id')
            ->references('id')
            ->on('posts')
            ->onDelete('cascade');

            $table->foreign('comment_id')
            ->references('id')
            ->on('comments')
            ->onDelete('cascade');

            $table->foreign('nested_comment_id')
            ->references('id')
            ->on('nested_comments')
            ->onDelete('cascade');

            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('like_dislikes');
    }
};
