<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonalitiesTable extends Migration
{

    public function up()
    {
        Schema::create('personalities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',50)->unique();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('personalities');
    }
}
