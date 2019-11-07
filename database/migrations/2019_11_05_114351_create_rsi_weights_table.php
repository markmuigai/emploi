<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRsiWeightsTable extends Migration
{
    public function up()
    {
        Schema::create('rsi_weights', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('weight');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('rsi_weights');
    }
}
