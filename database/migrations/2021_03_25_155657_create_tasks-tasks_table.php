<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks-tasks', function (Blueprint $table) {
            $table->bigInteger('task_1')->unsigned();
            $table->foreign('task_1')->references('id')->on('tasks');
            $table->bigInteger('task_0')->unsigned();
            $table->foreign('task_0')->references('id')->on('tasks');
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
        Schema::dropIfExists('tasks-tasks');
    }
}
