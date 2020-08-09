<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeekerSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
   {
        Schema::create('seeker_subscriptions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');            
            $table->string('name',100);
            $table->string('industry_id',100);
            $table->string('phone_number');
            $table->string('email',100);
            $table->string('status',50)->default('inactive');
            $table->timestamp('ending')->nullable();
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
        Schema::dropIfExists('seeker_subscriptions');
    }
}
