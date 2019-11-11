<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOtherSeekerSkillsTable extends Migration
{
    
    public function up()
    {
        Schema::create('other_seeker_skills', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('seeker_id');
            $table->integer('referee_id');
            $table->string('name',100);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('other_seeker_skills');
    }
}
