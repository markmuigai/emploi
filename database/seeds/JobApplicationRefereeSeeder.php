<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JobApplicationRefereeSeeder extends Seeder
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
            $sql = database_path('/sql/job_application_referees.sql');
            // collect contents and pass to DB::unprepared
            DB::unprepared(file_get_contents($sql));
        });
    }
}
