<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeekerPersonalitiesTable extends Migration
{

    public function up()
    {
        Schema::create('seeker_personalities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('job_application_id');
            $table->integer('personality_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('seeker_personalities');
    }
}
