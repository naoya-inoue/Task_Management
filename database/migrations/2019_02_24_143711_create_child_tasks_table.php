<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChildTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('child_tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->text('ToDo');
            $table->integer('status');
            $table->integer('task_id')->unsigned()->index();
            $table->timestamps();
            // 外部キー制約
            $table->foreign('task_id')->references('id')->on('tasks');

        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('child_tasks');
    }
}
