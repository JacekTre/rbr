<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('content');
            $table->unsignedBigInteger('author')->unsigned();
            $table->timestamps();
        });

        Schema::table(
            'posts', function ($table) {
            $table->foreign('author')->references('id')->on('users');
        });
    }

    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
