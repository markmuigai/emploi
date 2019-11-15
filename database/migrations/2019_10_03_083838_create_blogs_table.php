<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{

    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->integer('blog_category_id');
            $table->string('title',500);
            $table->string('slug',800)->unique();
            $table->text('contents');
            $table->string('image1',500)->nullable();
            $table->string('image2',500)->nullable();
            $table->string('status',20)->default('active');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('blogs');
    }
}
