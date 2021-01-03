<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSearchedKeysTable extends Migration
{
    
    public function up()
    {
        Schema::create('searched_keys', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('keywords',50);
            $table->integer('location_id')->nullable();
            $table->integer('industry_id')->nullable();
            $table->integer('vacancy_type_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->string('domain',500)->default('emploi.co');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('searched_keys');
    }
}
