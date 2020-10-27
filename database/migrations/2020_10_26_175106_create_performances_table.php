<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerformancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('performances', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('assessment_count')->default(1);
            $table->integer('user_id')->nullable();
            $table->string('email',100);
            $table->string('name',100)->nullable(); 
            $table->string('question')->nullable();
            $table->string('choice');
            $table->boolean('correct');
            $table->enum('difficulty_level', ['easy','medium','hard'])->nullable();
            $table->string('optional_message')->nullable();
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
        Schema::dropIfExists('performances');
    }
}
