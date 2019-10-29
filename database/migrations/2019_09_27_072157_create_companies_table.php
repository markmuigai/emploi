<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',50)->unique();
            $table->integer('user_id')->nullable();
            $table->integer('industry_id');
            $table->integer('company_size_id');
            $table->integer('location_id');
            $table->string('logo',500)->nullable();
            $table->string('tagline',5000)->nullable();
            $table->text('about')->nullable();
            $table->string('website',100)->nullable();
            $table->string('status',20)->default('active');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('companies');
    }
}
