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
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->string('job_title',50);
            $table->text('responsibilities');
            $table->string('relationship',50);
            $table->string('reason_for_leaving',500);
            $table->integer('performance'); //0-100
            $table->text('strengths');
            $table->text('weaknesses');
            $table->text('discplinary_cases');
            $table->integer('professionalism'); //0-100
            $table->integer('would_you_rehire'); //0-100
            $table->text('comments');
            $table->string('status',50)->default('active');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('job_application_referees');
    }
}
