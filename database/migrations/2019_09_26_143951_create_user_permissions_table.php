<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserPermissionsTable extends Migration
{
    
    public function up()
    {
        Schema::create('user_permissions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->integer('permission_id');
            $table->string('status',20)->default('active');
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('user_permissions');
    }
}
