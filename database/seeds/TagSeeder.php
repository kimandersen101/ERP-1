<?php

use Illuminate\Database\Seeder;
use App\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::create([
            'key' => 'practice-lead',
            'name' => 'Practice Lead',
            'type' => 'GENERAL',
            'is_visible' => true
        ]);

        Tag::create([
            'key' => 'hot-lead',
            'name' => 'Hot Lead',
            'type' => 'SYSTEM',
            'is_visible' => false
        ]);

        Tag::create([
            'key' => 'handoff',
            'name' => 'Handoff',
            'type' => 'GENERAL',
            'is_visible' => true
        ]);

        Tag::create([
            'key' => 'lost',
            'name' => 'Lost',
            'type' => 'SYSTEM',
            'is_visible' => true
        ]);

        Tag::create([
            'key' => 'agent',
            'name' => 'Agent',
            'type' => 'SYSTEM',
            'is_visible' => true
        ]);

        Tag::create([
            'key' => 'customer',
            'name' => 'Customer',
            'type' => 'SYSTEM',
            'is_visible' => true
        ]);

        Tag::create([
            'key' => 'team-support',
            'name' => 'Team Support',
            'type' => 'SYSTEM',
            'is_visible' => true
        ]);
    }
}
