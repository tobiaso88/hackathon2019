<?php

use Illuminate\Database\Seeder;

class NamesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($year = 1910; $year <= 2017; $year++) {
            $file = file(Storage::disk('seeding')->path('names/yob' . $year . '.TXT'));
            foreach ($file as $lineNumber => $line) {
                if (empty($line)) {
                    continue;
                }
                $col = explode(",", $line);
                list($name, $gender, $amount) = $col;

                DB::table('names')->insert([
                    'name' => $name,
                    'gender' => $gender,
                    'year' => $year,
                    'amount' => $amount,
                ]);
            }
        }
    }
}
