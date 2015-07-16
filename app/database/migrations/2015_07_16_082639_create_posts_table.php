<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->nullable();
            $table->string('title', 100);
            $table->string('abstract', 255)->nullable();
            $table->text('content');
            $table->string('url_thumbnail', 150);
            $table->enum('status', ['publish', 'unpublish'])->default('unpublish');
            $table->foreign('user_id')
                ->references('id')
                ->on('admins')
                ->onDelete('SET NULL');
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
        Schema::drop('posts');
    }

}