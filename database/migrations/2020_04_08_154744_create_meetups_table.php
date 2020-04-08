<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeetupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meetups', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('slug',50)->unique();
            $table->string('name',500);
            $table->integer('user_id');
            $table->string('email',50);
            $table->string('phone_number',50)->nullable();
            $table->string('image',500)->nullable();
            $table->decimal('price',10,2)->default(0.00);
            $table->string('caption',500)->nullable();
            $table->longtext('description');

            $table->integer('location_id')->nullable(); //null location means online
            $table->integer('industry_id')->nullable(); 
            
            $table->string('address',1000);
            $table->integer('capacity')->nullable();
            $table->timestamp('registration_deadline')->nullable();
            $table->timestamp('start_time')->nullable();
            $table->timestamp('end_time')->nullable();
            $table->string('target_category',100)->default('seeers')->nullable();
            $table->string('public')->default('true')->nullable();
            $table->timestamp('cancelled_at')->nullable();
            $table->timestamp('started_at')->nullable();
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
        Schema::dropIfExists('meetups');
    }
}
