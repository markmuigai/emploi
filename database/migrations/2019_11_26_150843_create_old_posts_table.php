<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOldPostsTable extends Migration
{
    public function up()
    {
        Schema::create('old_posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title',1000);
            $table->string('slug',500)->unique();
            $table->integer('country_id');
            $table->text('contents')->nullable();
            $table->integer('imported_from_post_id');
            $table->string('category',100)->default('vacancies');
            $table->string('status',200)->defaul('published');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('old_posts');
    }
}
