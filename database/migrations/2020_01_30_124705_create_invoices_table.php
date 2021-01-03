<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('order_id')->nullable();
            $table->string('slug',50)->unique();
            $table->string('first_name',50)->nullable();
            $table->string('last_name',50)->nullable();
            $table->string('phone_number',50)->nullable();
            $table->string('email',100);
            $table->longtext('description')->nullable();
            $table->decimal('sub_total',10,2)->nullable();
            $table->string('pesapal_merchant_reference',200)->nullable();
            $table->string('pesapal_transaction_tracking_id',200)->nullable();
            $table->string('alternative_payment_slug',200)->nullable();
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
        Schema::dropIfExists('invoices');
    }
}
