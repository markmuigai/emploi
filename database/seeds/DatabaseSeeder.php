<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            RawDataSeeder::class,
            // JobsSeeder::class,
            // UserSeeder::class
        ]);
    }
}
