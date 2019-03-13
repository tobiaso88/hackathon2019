<?php

use Illuminate\Database\Seeder;

class NamesSummaryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement(
            "INSERT INTO names_summary (name, amount)
                SELECT name, SUM(amount) FROM `names` GROUP BY name"
        );
    }
}
