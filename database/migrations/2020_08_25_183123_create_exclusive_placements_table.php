<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExclusivePlacementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exclusive_placements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('email',100);
            $table->string('name',100);
            $table->string('phone_number',20);
            $table->integer('industry_id');
            $table->string('message');
            $table->string('status',20)->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exclusive_placements');
    }
}
