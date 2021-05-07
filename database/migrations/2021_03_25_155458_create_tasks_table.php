<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('bodyText')->nullable();
            $table->string('bodyImage')->nullable();
            $table->string('firstAnswer');
            $table->string('secondAnswer');
            $table->string('thirdAnswer');
            $table->string('fourthAnswer');
            $table->string('solution');
            $table->string('instructions');
            $table->bigInteger('level')->unsigned();
            $table->foreign('level')->references('id')->on('levels');
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
        Schema::dropIfExists('tasks');
    }
}
