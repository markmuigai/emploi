<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class OldPostsContentsToLongText extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('old_posts', function (Blueprint $table) {
            DB::statement('ALTER TABLE old_posts MODIFY contents LONGTEXT;');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('old_posts', function (Blueprint $table) {
            DB::statement('ALTER TABLE old_posts MODIFY contents TEXT;');
        });
    }
}
