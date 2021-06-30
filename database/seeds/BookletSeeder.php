<?php

use Illuminate\Database\Seeder;
use App\Booklet;

class BookletSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Booklet::create([
            'title' => 'software-demand.com Booklet'
        ]);
    }
}
