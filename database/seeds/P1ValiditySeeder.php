<?php

use Illuminate\Database\Seeder;
use \App\P1Validity;

class P1ValiditySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $p1_validity = [];
        foreach ([2, 3] as $household_size) {
            $months = $household_size == 2 ? 6 : 5;

            foreach (range(1,5) as $zone) {
                $p1_validity[] = [
                    'zone' => $zone,
                    'household_size' => $household_size,
                    'months' => $months--
                ];
            }
        }

        P1Validity::insert($p1_validity);
    }
}
