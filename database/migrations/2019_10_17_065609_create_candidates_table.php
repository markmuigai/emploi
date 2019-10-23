<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidatesTable extends Migration
{
    public function up()
    {
        Schema::create('candidates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('seeker_id');
            $table->integer('post_id');
            $table->decimal('monthly_salary',10,2)->default(0);
            $table->string('status',20)->default('active');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('candidates');
    }
}
