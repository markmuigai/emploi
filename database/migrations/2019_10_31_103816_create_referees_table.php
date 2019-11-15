<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRefereesTable extends Migration
{
    public function up()
    {
        Schema::create('referees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('seeker_id');
            $table->string('slug',500)->unique();
            $table->string('name',500);
            $table->string('email',500);
            $table->string('phone_number',500);
            $table->string('organization',500);
            $table->string('position_held',500);
            $table->string('relationship',500);
            $table->string('status',20)->default('pending-details');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('referees');
    }
}
