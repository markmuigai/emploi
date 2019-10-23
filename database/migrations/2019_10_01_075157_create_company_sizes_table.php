<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanySizesTable extends Migration
{    public function up()
    {
        Schema::create('company_sizes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('lower_limit');
            $table->integer('upper_limit');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('company_sizes');
    }
}
