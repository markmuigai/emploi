<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCVRecommendationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_c_v_recommendations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->unsignedInteger('cvReviewResult_id');
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
        Schema::dropIfExists('_c_v_recommendations');
    }
}
