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
            $table->string('slug',50)->unique();
            $table->string('name',50);
            $table->string('email',50);
            $table->string('phone_number',50);
            $table->string('organization',50);
            $table->string('position_held',50);
            $table->string('relationship',50);
            $table->string('status',20)->default('pending-details');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('referees');
    }
}
