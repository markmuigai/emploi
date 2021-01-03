<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeekerIndustrySkillsTable extends Migration
{

    public function up()
    {
        Schema::create('seeker_industry_skills', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('industry_skill_id');
            $table->integer('seeker_id');
            $table->integer('referee_id');
            $table->integer('weight');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('seeker_industry_skills');
    }
}
