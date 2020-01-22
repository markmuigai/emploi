<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCvEditRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cv_edit_requests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('slug',50)->unique();
            $table->string('email',100);
            $table->string('name',100);
            $table->integer('industry_id');
            $table->string('message',500);
            $table->string('original_url',100);
            $table->string('submitted_url',100)->nullable();
            $table->string('status',20)->default('pending');
            $table->timestamp('submitted_on')->nullable();
            $table->integer('cv_editor_id')->nullable();
            $table->timestamp('assigned_on')->nullable();
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
        Schema::dropIfExists('cv_edit_requests');
    }
}
