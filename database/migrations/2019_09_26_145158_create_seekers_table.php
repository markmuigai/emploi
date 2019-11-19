<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeekersTable extends Migration
{

    public function up()//add education, experience
    {
        Schema::create('seekers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->string('public_name',100)->nullable();
            $table->string('gender',1)->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('phone_number',255)->nullable();
            $table->string('current_position',255)->nullable();
            $table->string('post_address',255)->nullable();
            $table->integer('years_experience')->default(0);
            $table->integer('industry_id');
            $table->integer('country_id');
            $table->integer('location_id')->nullable();
            $table->integer('education_level_id')->nullable();
            $table->text('objective')->nullable();
            $table->text('education')->nullable();
            $table->text('experience')->nullable();
            $table->text('resume_contents')->nullable();
            $table->string('resume',1000)->nullable();
            $table->integer('featured')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('seekers');
    }
}
