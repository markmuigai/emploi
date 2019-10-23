<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountriesTable extends Migration
{

    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',50)->unique();
            $table->string('code',5)->unique();
            $table->string('prefix',5)->unique();
            $table->string('currency',5)->default('KES');
            $table->string('status',20)->default('active');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('countries');
    }
}
