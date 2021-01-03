<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceCreditRedemptionsTable extends Migration
{
    /**
     * Run the migrations.'credit_id', 'invoice_id'
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_credit_redemptions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('credit_id');
            $table->integer('invoice_id');
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
        Schema::dropIfExists('invoice_credit_redemptions');
    }
}
