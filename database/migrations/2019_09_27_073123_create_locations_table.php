<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationsTable extends Migration
{

    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',50)->unique();
            $table->integer('country_id');
            $table->string('status',20)->default('active');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('locations');
    }
}
