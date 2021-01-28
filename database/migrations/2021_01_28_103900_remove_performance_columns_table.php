<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemovePerformanceColumnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('performances', function($table) {
            // $table->dropColumn('assessment_count');
            // $table->dropColumn('user_id');
            // $table->dropColumn('email');
            // $table->dropColumn('optional_message');
         });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('performances', function($table) {
            // $table->integer('assessment_count')->default(1);
            // $table->integer('user_id')->nullable();
            // $table->string('email',100);
            // $table->string('optional_message')->nullable();
         });
    }
}
