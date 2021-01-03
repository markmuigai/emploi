<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeekerPreviousCompanySizesTable extends Migration
{
    public function up()
    {
        Schema::create('seeker_previous_company_sizes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('job_application_id');
            $table->string('name',100);
            $table->integer('company_size_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('seeker_previous_company_sizes');
    }
}
