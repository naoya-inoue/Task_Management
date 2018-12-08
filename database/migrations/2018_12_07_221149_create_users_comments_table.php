<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_comments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('comment_id')->unsigned()->index();
            $table->integer('task_id')->unsigned()->index();
            $table->timestamps();
            
            //外部キー
            $table->foreign('comment_id')->references('id')->on('comments')->onDelete('cascade');
            $table->foreign('task_id')->references('id')->on('tasks')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_comments');
    }
}
