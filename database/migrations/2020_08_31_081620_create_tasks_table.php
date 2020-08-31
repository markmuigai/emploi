<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('slug',50)->unique();
            $table->integer('employer_id')->nullable();
            $table->string('name',100);
            $table->string('email',100);
            $table->string('phone_number')->nullable();
            $table->string('company')->nullable();
            $table->string('title',500)->nullable();
            $table->integer('positions')->default(1);
            $table->longtext('description')->nullable();
            $table->string('industry')->nullable();
            $table->decimal('salary',10,2)->nullable();
            $table->string('status',50)->default('pending');
            $table->string('assignee')->nullable();
            $table->longtext('sub-task')->nullable();
            $table->timestamp('assigned_on')->nullable();
            $table->timestamp('started_at')->nullable();
            $table->timestamp('end_at')->nullable();
            $table->timestamp('ended_at')->nullable();
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
        Schema::dropIfExists('tasks');
    }
}
