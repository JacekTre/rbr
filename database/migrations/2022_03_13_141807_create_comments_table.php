<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('post_id')->unsigned();
            $table->text('content');
            $table->unsignedBigInteger('author')->unsigned();
            $table->timestamps();
        });

        Schema::table(
            'comments', function ($table) {
            $table->foreign('post_id')->references('id')->on('posts');
        });

        Schema::table(
            'comments', function ($table) {
            $table->foreign('author')->references('id')->on('users');
        });
    }

    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
