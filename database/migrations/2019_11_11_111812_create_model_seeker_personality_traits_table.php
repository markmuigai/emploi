<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModelSeekerPersonalityTraitsTable extends Migration
{
    public function up()
    {
        Schema::create('model_seeker_personality_traits', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('model_seeker_id');
            $table->integer('personality_trait_id');
            $table->integer('weight')->default(1);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('model_seeker_personality_traits');
    }
}
