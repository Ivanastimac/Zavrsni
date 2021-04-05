<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLevelLevelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('level_level', function (Blueprint $table) {
            $table->bigInteger('level_1')->unsigned()->nullable();
            $table->foreign('level_1')->references('id')->on('levels');
            $table->bigInteger('level_0')->unsigned()->nullable();
            $table->foreign('level_0')->references('id')->on('levels');
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
        Schema::dropIfExists('level_level');
    }
}
