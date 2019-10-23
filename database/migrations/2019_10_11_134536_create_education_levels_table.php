<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEducationLevelsTable extends Migration
{
    public function up()
    {
        Schema::create('education_levels', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',50);
            $table->integer('superior_id')->nullable();
            $table->integer('inferior_id')->nullable();
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('education_levels');
    }
}
