<?php

use Illuminate\Database\Seeder;
use App\TicketCategory;

class TicketCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TicketCategory::create([
            'key' => 'smell',
            'title' => 'I smell something'
        ]);

        TicketCategory::create([
            'key' => 'leak',
            'title' => 'Leak'
        ]);

        TicketCategory::create([
            'key' => 'no-water',
            'title' => 'No water'
        ]);

        TicketCategory::create([
            'key' => 'app-issue',
            'title' => 'Bob app issue'
        ]);

        TicketCategory::create([
            'key' => 'other',
            'title' => 'Other'
        ]);
    }
}
