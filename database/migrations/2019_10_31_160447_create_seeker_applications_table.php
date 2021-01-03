<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeekerApplicationsTable extends Migration
{

    public function up()
    {
        Schema::create('seeker_applications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('job_application_id');
            $table->integer('job_application_referee_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('seeker_applications');
    }
}
