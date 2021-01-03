<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJurisdictionsTable extends Migration
{

    public function up()
    {
        Schema::create('jurisdictions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_permission_id');
            $table->integer('country_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('jurisdictions');
    }
}
