<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // run a set of operations within a database transaction
        DB::transaction(function () {
            // Get sql file path
            $sql = database_path('/sql/products.sql');
            // collect contents and pass to DB::unprepared
            DB::unprepared(file_get_contents($sql));
        });
    }
}
