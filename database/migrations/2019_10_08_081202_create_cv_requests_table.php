<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCvRequestsTable extends Migration
{
    public function up()
    {
        Schema::create('cv_requests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('employer_id');
            $table->integer('seeker_id');
            $table->string('status',20)->default('pending');
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('cv_requests');
    }
}
