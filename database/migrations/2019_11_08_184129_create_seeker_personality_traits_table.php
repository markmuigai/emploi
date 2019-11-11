<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeekerPersonalityTraitsTable extends Migration
{
    public function up()
    {
        Schema::create('seeker_personality_traits', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('seeker_id');
            $table->integer('referee_id');
            $table->integer('personality_trait_id');
            $table->integer('weight');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('seeker_personality_traits');
    }
}
