<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePsychometricTestsTable extends Migration
{

    public function up()
    {
        Schema::create('psychometric_tests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('job_application_id');
            $table->integer('score')->default(0);//0-100
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('psychometric_tests');
    }
}
