<?php

use Illuminate\Database\Seeder;
use App\Video;

class VideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // EDUCATIONAL VIDEOS
        Video::create([
            'id' => 1,
            'slug' => 'overview',
            'title' => 'software-demand.com Overview',
            'wistia_hash' => 'y19hgypas9',
            'funnel_order' => 1,
            'is_educational' => 1,
            'is_testimonial' => 0,
            'is_business' => 0
        ]);

        Video::create([
            'id' => 2,
            'slug' => 'pure',
            'title' => 'Pure',
            'wistia_hash' => 'g280duoq2i',
            'funnel_order' => 2,
            'is_educational' => 1,
            'is_testimonial' => 0,
            'is_business' => 0
        ]);

        Video::create([
            'id' => 3,
            'slug' => 'clean',
            'title' => 'Clean',
            'wistia_hash' => 'tyd8ii351s',
            'funnel_order' => 3,
            'is_educational' => 1,
            'is_testimonial' => 0,
            'is_business' => 0
        ]);

        Video::create([
            'id' => 4,
            'slug' => 'safe',
            'title' => 'Safe',
            'wistia_hash' => 'or1vhuqnc8',
            'funnel_order' => 4,
            'is_educational' => 1,
            'is_testimonial' => 0,
            'is_business' => 0
        ]);

        Video::create([
            'id' => 5,
            'slug' => 'life',
            'title' => 'Life',
            'wistia_hash' => 'ffgtuson9a',
            'funnel_order' => 5,
            'is_educational' => 1,
            'is_testimonial' => 0,
            'is_business' => 0
        ]);

        Video::create([
            'id' => 6,
            'slug' => 'hydrogen-mitochondria',
            'title' => 'Hydrogen & Mitochondria',
            'wistia_hash' => 'ltdcd258eg',
            'funnel_order' => 6,
            'is_educational' => 1,
            'is_testimonial' => 0,
            'is_business' => 0
        ]);

        Video::create([
            'id' => 7,
            'slug' => 'ph-importance',
            'title' => 'Importance of pH balance',
            'wistia_hash' => '7sxaqokwg8',
            'funnel_order' => 7,
            'is_educational' => 1,
            'is_testimonial' => 0,
            'is_business' => 0
        ]);

        Video::create([
            'id' => 8,
            'slug' => 'technology-value',
            'title' => 'The Value Of Technology',
            'wistia_hash' => 'p9vztqb1p1',
            'funnel_order' => 8,
            'is_educational' => 1,
            'is_testimonial' => 0,
            'is_business' => 0
        ]);

        Video::create([
            'id' => 9,
            'slug' => 'why-different',
            'title' => 'Why we are different',
            'wistia_hash' => 'g208wyo5tl',
            'funnel_order' => 9,
            'is_educational' => 1,
            'is_testimonial' => 0,
            'is_business' => 0
        ]);

        Video::create([
            'id' => 10,
            'slug' => 'purchase',
            'title' => 'Purchase Options',
            'wistia_hash' => 'wod0lrn5oy',
            'funnel_order' => 10,
            'is_educational' => 1,
            'is_testimonial' => 0,
            'is_business' => 0
        ]);

        Video::create([
            'id' => 11,
            'slug' => 'filter-maintenance',
            'title' => 'Filter Maintenance',
            'wistia_hash' => 'zv4je49pva',
            'funnel_order' => 11,
            'is_educational' => 1,
            'is_testimonial' => 0,
            'is_business' => 0
        ]);

        // TESTIMONIAL VIDEO
        Video::create([
            'id' => 12,
            'slug' => 'dr-tracy',
            'title' => 'Dr. Tracy Cook',
            'wistia_hash' => '6wpabem0b3',
            'funnel_order' => 12,
            'is_educational' => 0,
            'is_testimonial' => 1,
            'is_business' => 0
        ]);

        Video::create([
            'id' => 13,
            'slug' => 'business-opportunity',
            'title' => 'Business Opportunity',
            'wistia_hash' => 'mabcqxqktd',
            'funnel_order' => 13,
            'is_educational' => 0,
            'is_testimonial' => 0,
            'is_business' => 1
        ]);

         Video::create([
            'id' => 14,
            'slug' => 'compensation',
            'title' => 'Compensation',
            'wistia_hash' => 'gn9peu0fl3',
            'funnel_order' => 14,
            'is_educational' => 0,
            'is_testimonial' => 0,
            'is_business' => 1
         ]);

         Video::create([
            'id' => 15,
            'slug' => 'baram',
            'title' => 'Baram',
            'wistia_hash' => 'old2pkvgmw',
            'funnel_order' => 15,
            'is_educational' => 0,
            'is_testimonial' => 1,
            'is_business' => 0
         ]);

        Video::create([
            'id' => 16,
            'slug' => 'steve-woodward',
            'title' => 'Steve Woodward',
            'wistia_hash' => '0nwxouawzt',
            'funnel_order' => 16,
            'is_educational' => 0,
            'is_testimonial' => 1,
            'is_business' => 0
        ]);

        Video::create([
            'id' => 17,
            'slug' => 'dave-and-virginia',
            'title' => 'Dave and Virginia Van Pelt',
            'wistia_hash' => '37yj392h50',
            'funnel_order' => 17,
            'is_educational' => 0,
            'is_testimonial' => 1,
            'is_business' => 0
        ]);

        Video::create([
            'id' => 18,
            'slug' => 'getting-started',
            'title' => 'Getting Started',
            'wistia_hash' => 'hy6gubf1pq'
        ]);

        // Help Videos
        Video::create([
            'id' => 19,
            'slug' => 'add-contact',
            'title' => 'Add Contact',
            'wistia_hash' => 'losx3sgkko'
        ]);

        Video::create([
            'id' => 20,
            'slug' => 'managing-permissions',
            'title' => 'Managing Permissions',
            'wistia_hash' => 'ukup2bm6r1'
        ]);

        Video::create([
            'id' => 21,
            'slug' => 'my-tasks',
            'title' => 'My Tasks',
            'wistia_hash' => 'whrgmxnmhw'
        ]);

        Video::create([
            'id' => 22,
            'slug' => '3rd-base',
            'title' => '3rd base',
            'wistia_hash' => 'n903595aoc'
        ]);

        Video::create([
            'id' => 23,
            'slug' => 'schedule-support-apt',
            'title' => 'Schedule With Sales Support',
            'wistia_hash' => '97p1lq4xxd'
        ]);
    }
}
