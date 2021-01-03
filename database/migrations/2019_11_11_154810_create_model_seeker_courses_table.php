<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModelSeekerCoursesTable extends Migration
{

    public function up()
    {
        Schema::create('model_seeker_courses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('model_seeker_id');
            $table->integer('course_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('model_seeker_courses');
    }
}
