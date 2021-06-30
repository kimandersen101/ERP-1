<?php

use Illuminate\Database\Seeder;
use App\HelpVideo;

class HelpVideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        HelpVideo::create([
			'page' => '/phonebook/handoff',
			'label' => 'Contact Help Handoff',
			'title' => '',
			'description' => '',
			'video_id' => 19,
            'is_agent' => true
        ]);

        HelpVideo::create([
			'page' => '/phonebook/manage-myself',
			'label' => 'Contact Help',
			'title' => '',
			'description' => '',
			'video_id' => 19,
            'is_agent' => true
        ]);

		HelpVideo::create([
			'page' => '/hot-leads/all',
			'label' => 'Hot Lead Help',
			'title' => '',
			'description' => '',
			'video_id' => 22,
            'is_agent' => true
        ]);

		HelpVideo::create([
			'page' => '/permissions',
			'label' => 'Permission Help',
			'title' => '',
			'description' => '',
			'video_id' => 20,
            'is_agent' => true
        ]);

		HelpVideo::create([
			'page' => '/tasks-list',
			'label' => 'Todays Task Help',
			'title' => '',
			'description' => '',
			'video_id' => 21,
            'is_agent' => true
        ]);

		HelpVideo::create([
			'page' => '/hot-leads/team-support-list',
			'label' => 'Support',
			'title' => '',
			'description' => '',
			'video_id' => 22,
            'is_agent' => true
        ]);
    }
}
