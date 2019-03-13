<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(NamesTableSeeder::class);
        $this->call(NamesByStateTableSeeder::class);
        $this->call(NamesSummaryTableSeeder::class);
    }
}
