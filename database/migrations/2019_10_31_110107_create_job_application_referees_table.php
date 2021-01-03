<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobApplicationRefereesTable extends Migration
{
    public function up()
    {
        Schema::create('job_application_referees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('seeker_id');
            $table->integer('referee_id');
            $table->string('reason_for_leaving',500);
            $table->text('strengths')->nullable();
            $table->text('weaknesses')->nullable();
            $table->text('discplinary_cases');
            $table->integer('professionalism'); //0-100
            $table->string('would_you_rehire',500); //0-100
            $table->text('comments')->nullable();
            $table->string('status',50)->default('active');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('job_application_referees');
    }
}
