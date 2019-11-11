<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeekerJobsTable extends Migration
{
    public function up()
    {
        Schema::create('seeker_jobs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('seeker_id');
            $table->integer('referee_id');
            $table->string('job_title',50);
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->integer('meeting_targets')->default(100);
            $table->integer('work_performance')->default(100);
            $table->integer('work_quality')->default(100);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('seeker_jobs');
    }
}
