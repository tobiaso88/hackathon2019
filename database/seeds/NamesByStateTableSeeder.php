<?php

use Illuminate\Database\Seeder;

class NamesByStateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        collect(Storage::disk('seeding')->files('namesbystate'))
            ->each(function($filename) {
                $file = file(Storage::disk('seeding')->path($filename));
                foreach ($file as $lineNumber => $line) {
                    if (empty($line)) {
                        continue;
                    }
                    $col = explode(",", $line);
                    list($state, $gender, $year, $name, $amount) = $col;

                    DB::table('names')->insert([
                        'name' => $name,
                        'gender' => $gender,
                        'year' => $year,
                        'amount' => $amount,
                        'state' => $state,
                    ]);
                }
            });
    }
}
