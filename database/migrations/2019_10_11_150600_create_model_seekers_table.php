<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModelSeekersTable extends Migration
{
    
    public function up()
    {
        Schema::create('model_seekers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('post_id');
            $table->integer('education_level_id');
            $table->integer('education_level_importance')->default(50); //0-100
            $table->integer('personality_test_id');
            $table->integer('experience_duration');
            $table->integer('experience_level_importance')->default(50); //0-100
            $table->boolean('iq_test')->default(true);
            $table->integer('iq_score');
            $table->boolean('interview')->default(true);
            $table->integer('interview_result_score');
            $table->boolean('psychometric')->default(true);
            $table->integer('psychometric_test_score');
            $table->integer('company_size_id');
            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('model_seekers');
    }
}
