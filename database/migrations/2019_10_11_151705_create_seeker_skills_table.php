<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeekerSkillsTable extends Migration
{
    
    public function up()
    {
        Schema::create('seeker_skills', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('skill_id');
            $table->integer('seeker_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('seeker_skills');
    }
}
