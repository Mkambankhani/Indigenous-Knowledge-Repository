<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('task_id');
            $table->integer('user_id',false,true)->length(11);
            $table->integer('role_id',false,true)->length(11);
            $table->integer('article',false,true)->length(11);
            $table->integer('task_status',false,true)->length(11);
            $table->integer('progress_presentation',false,true)->length(3);
            $table->string('description',500);
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
        Schema::drop('tasks');
    }
}
