<?php

use Illuminate\Database\Seeder;
use App\Agent;

class AgentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Demo	User (Global Support)
        Agent::create([
            'user_id' => 1,
            'hide_initial_popup' => true
        ]);

        // Kenny Lu (Global Support)
        Agent::create([
            'user_id' => 2,
            'hide_initial_popup' => true
        ]);

        // Aqeel TeamSupport
        Agent::create([
            'user_id' => 3,
            'hide_initial_popup' => true
        ]);

        // Usman Agent
        Agent::create([
            'user_id' => 4,
            'hide_initial_popup' => true
        ]);

        // Subhan Agent
        Agent::create([
            'user_id' => 5,
            'hide_initial_popup' => true
        ]);

        // Aqeel Agent
        Agent::create([
            'user_id' => 6,
            'hide_initial_popup' => true
        ]);

        Agent::create([
            'user_id' => 8,
            'hide_initial_popup' => true
        ]);

        Agent::create([
            'user_id' => 9,
            'hide_initial_popup' => true
        ]);

        Agent::create([
            'user_id' => 10,
            'hide_initial_popup' => true
        ]);

        Agent::create([
            'user_id' => 11,
            'hide_initial_popup' => true
        ]);

        Agent::create([
            'user_id' => 12,
            'hide_initial_popup' => true
        ]);

        Agent::create([
            'user_id' => 13,
            'hide_initial_popup' => true
        ]);

        Agent::create([
            'user_id' => 14,
            'hide_initial_popup' => true
        ]);

        Agent::create([
            'user_id' => 15,
            'hide_initial_popup' => true
        ]);

        Agent::create([
            'user_id' => 16,
            'hide_initial_popup' => true
        ]);

        Agent::create([
            'user_id' => 17,
            'hide_initial_popup' => true
        ]);

    }
}
