<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOldPostIndustriesTable extends Migration
{
    public function up()
    {
        Schema::create('old_post_industries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('old_post_id');
            $table->integer('industry_id');
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('old_post_industries');
    }
}
