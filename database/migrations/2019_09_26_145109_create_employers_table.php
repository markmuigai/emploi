<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployersTable extends Migration
{

    public function up()
    {
        Schema::create('employers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->string('name',100);
            $table->integer('industry_id');
            $table->string('company_name',50);
            $table->string('contact_phone',500);
            $table->string('company_phone',500);
            $table->string('company_email',50);
            $table->integer('country_id');
            $table->integer('credits')->default(1000);
            $table->string('address',500);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('employers');
    }
}
