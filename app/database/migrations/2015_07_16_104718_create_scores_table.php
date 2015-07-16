<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScoresTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scores', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->nullable();
            $table->integer('question_id')->unsigned()->nullable();
            $table->enum('status', ['fait', 'pas fait'])->default('pas fait');
            $table->integer('note')->unsigned()->nullable();
            $table->foreign('user_id')
                ->references('id')
                ->on('admins')
                ->onDelete('SET NULL');
            $table->foreign('question_id')
                ->references('id')
                ->on('questions')
                ->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('scores');
    }

}
