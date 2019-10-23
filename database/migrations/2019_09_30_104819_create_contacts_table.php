<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{

    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code',50)->unique();
            $table->string('name',50);
            $table->string('email',50);
            $table->string('phone_number',50);
            $table->text('message');
            $table->integer('resolved_by')->nullable();
            $table->timestamp('resolved_on')->nullable();
            $table->text('resolve_notes')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('contacts');
    }
}
