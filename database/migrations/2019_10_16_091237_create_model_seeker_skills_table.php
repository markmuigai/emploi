<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModelSeekerSkillsTable extends Migration
{
    public function up()
    {
        Schema::create('model_seeker_skills', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('industrySkill_id');
            $table->integer('model_seeker_id');
            $table->integer('weight')->default(1);
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('model_seeker_skills');
    }
}
