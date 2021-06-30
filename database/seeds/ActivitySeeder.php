<?php

use Illuminate\Database\Seeder;
use App\Activity;

class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Activity::create([
            'user_id' => 3,
            'key' => 'hot-lead',
            'agent_id' => 2,
            'actor_id' => 1,
            'location' => 'landing'
        ]);

        Activity::create([
            'user_id' => 2,
            'key' => 'hot-lead',
            'agent_id' => 2,
            'actor_id' => 1,
            'location' => 'landing'
        ]);
    }
}
