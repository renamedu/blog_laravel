<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostUserLikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_user_likes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('post_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            // IDX
            $table->index('user_id', 'pul_user_idx');
            $table->index('post_id', 'pul_post_idx');
            // FK
            $table->foreign('user_id', 'pul_user_fk')->on('users')->references('id');
            $table->foreign('post_id', 'pul_post_fk')->on('posts')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_user_likes');
    }
}
