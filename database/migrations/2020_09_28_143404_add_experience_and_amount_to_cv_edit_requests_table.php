<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddExperienceAndAmountToCvEditRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cv_edit_requests', function (Blueprint $table) {
            $table->string('experience')->nullable();
            $table->string('amount')->nullable(); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cv_edit_requests', function (Blueprint $table) {
            $table->dropColumn('experience');
            $table->dropColumn('amount');                     
        });
    }
}
