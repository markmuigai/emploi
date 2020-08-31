<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIssuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('issues', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title',500);
            $table->string('description');
            $table->string('task_slug');
            $table->timestamp('start_on')->nullable();
            $table->timestamp('due_date')->nullable();
            $table->timestamp('ended_on')->nullable();
            $table->string('status')->nullable();
            $table->string('supervisor')->nullable();
            $table->string('owner')->nullable();
            $table->string('watcher')->nullable();
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
        Schema::dropIfExists('issues');
    }
}
