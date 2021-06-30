<?php

use Illuminate\Database\Seeder;
use App\Interest;

class InterestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Interest::create([
            'title' => 'software-demand.com water and health',
            'order' => 1
        ]);

        Interest::create([
            'title' => 'software-demand.com and your local water quality',
            'order' => 2
        ]);

        Interest::create([
            'title' => 'software-demand.com water and its ecofriendliness',
            'order' => 3
        ]);
    }
}
