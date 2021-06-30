<?php

use Illuminate\Database\Seeder;
use App\Article;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //parent article categories
        Article::create([
            'id' => 1,
            'is_trackable' => FALSE,
            'title' => 'Technology',
            'order' => 1,
        ]);

        Article::create([
            'id' => 6,
            'is_trackable' => FALSE,
            'title' => 'Water Quality',
            'order' => 6,
        ]);

        Article::create([
            'id' => 10,
            'is_trackable' => FALSE,
            'title' => 'Cost Analysis',
            'order' => 10,
        ]);

        Article::create([
            'id' => 15,
            'is_trackable' => FALSE,
            'title' => 'Shipping',
            'order' => 15,
        ]);

        Article::create([
            'id' => 20,
            'is_trackable' => FALSE,
            'title' => 'Installation',
            'order' => 20,
        ]);

        Article::create([
            'id' => 26,
            'is_trackable' => FALSE,
            'title' => 'Ongoing Filter Maintenance',
            'order' => 26,
        ]);

        Article::create([
            'id' => 33,
            'is_trackable' => FALSE,
            'title' => 'Other',
            'order' => 33,
        ]);



        //child articles
        Article::create([
            'id' => 2,
            'parent_id' => 1,
            'is_trackable' => TRUE,
            'title' => 'Why we are different (Chronological timeline)',
            'order' => 2,
        ]);

        Article::create([
            'id' => 3,
            'parent_id' => 1,
            'is_trackable' => TRUE,
            'title' => 'How software-demand.com compares to other water treatment systems',
            'order' => 3,
        ]);

        Article::create([
            'id' => 4,
            'parent_id' => 1,
            'is_trackable' => TRUE,
            'title' => 'software-demand.com Product Specifications',
            'order' => 4,
        ]);

        Article::create([
            'id' => 5,
            'parent_id' => 1,
            'is_trackable' => TRUE,
            'title' => '13 Health Benefits of Drinking Hydrogen Water',
            'order' => 5,
        ]);

        Article::create([
            'id' => 7,
            'parent_id' => 1,
            'is_trackable' => TRUE,
            'title' => 'Company Story',
            'order' => 7,
        ]);

        Article::create([
            'id' => 8,
            'parent_id' => 6,
            'is_trackable' => TRUE,
            'title' => 'Check water quality by Zip Code',
            'order' => 8,
        ]);

        Article::create([
            'id' => 9,
            'parent_id' => 6,
            'is_trackable' => TRUE,
            'title' => 'Filter Certification by SGS',
            'order' => 9,
        ]);

        Article::create([
            'id' => 11,
            'parent_id' => 10,
            'is_trackable' => TRUE,
            'title' => 'Purchase and Financing Options',
            'order' => 11,
        ]);

        Article::create([
            'id' => 12,
            'parent_id' => 10,
            'is_trackable' => TRUE,
            'title' => 'Filter Maintenance',
            'order' => 12,
        ]);

        Article::create([
            'id' => 13,
            'parent_id' => 10,
            'is_trackable' => TRUE,
            'title' => 'Water Cost per Gallon',
            'order' => 13,
        ]);

        Article::create([
            'id' => 14,
            'parent_id' => 10,
            'is_trackable' => TRUE,
            'title' => 'Return Policy and Warranty',
            'order' => 14,
        ]);

        Article::create([
            'id' => 16,
            'parent_id' => 15,
            'is_trackable' => TRUE,
            'title' => 'What is the average delivery time?',
            'order' => 16,
        ]);

        Article::create([
            'id' => 17,
            'parent_id' => 15,
            'is_trackable' => TRUE,
            'title' => 'How many boxes will I be receiving?',
            'order' => 17,
        ]);

        Article::create([
            'id' => 18,
            'parent_id' => 15,
            'is_trackable' => TRUE,
            'title' => 'What are the box dimensions including weight?',
            'order' => 18,
        ]);

        Article::create([
            'id' => 19,
            'parent_id' => 15,
            'is_trackable' => TRUE,
            'title' => 'Can I request shipment to the local FedEx store for pick up?',
            'order' => 19,
        ]);

        Article::create([
            'id' => 21,
            'parent_id' => 20,
            'is_trackable' => TRUE,
            'title' => 'What are my installation options?',
            'order' => 21,
        ]);

        Article::create([
            'id' => 22,
            'parent_id' => 20,
            'is_trackable' => TRUE,
            'title' => 'How safe is it to drill holes through granite, marble, quartz, and or other types of countertops?',
            'order' => 22,
        ]);

        Article::create([
            'id' => 23,
            'parent_id' => 20,
            'is_trackable' => TRUE,
            'title' => 'How do I know it will fit in my kitchen?',
            'order' => 23,
        ]);

        Article::create([
            'id' => 24,
            'parent_id' => 20,
            'is_trackable' => TRUE,
            'title' => 'If I rent a property, can I still get this unit installed?',
            'order' => 24,
        ]);

        Article::create([
            'id' => 25,
            'parent_id' => 20,
            'is_trackable' => TRUE,
            'title' => 'If I\'m moving, is this easy to move?',
            'order' => 25,
        ]);

        Article::create([
            'id' => 27,
            'parent_id' => 26,
            'is_trackable' => TRUE,
            'title' => 'How do I renew my filters?',
            'order' => 27,
        ]);

        Article::create([
            'id' => 28,
            'parent_id' => 26,
            'is_trackable' => TRUE,
            'title' => 'What is the warranty on filter renewals?',
            'order' => 28,
        ]);

        Article::create([
            'id' => 29,
            'parent_id' => 26,
            'is_trackable' => TRUE,
            'title' => 'What is the return policy on filter renewals?',
            'order' => 29,
        ]);

        Article::create([
            'id' => 30,
            'parent_id' => 26,
            'is_trackable' => TRUE,
            'title' => 'What is the software-demand.com Loyalty Program?',
            'order' => 30,
        ]);

        Article::create([
            'id' => 31,
            'parent_id' => 26,
            'is_trackable' => TRUE,
            'title' => 'Can someone help switch out my filters?',
            'order' => 31,
        ]);

        Article::create([
            'id' => 32,
            'parent_id' => 26,
            'is_trackable' => TRUE,
            'title' => 'Can I DIY my filter change?',
            'order' => 32,
        ]);

        Article::create([
            'id' => 34,
            'parent_id' => 33,
            'is_trackable' => TRUE,
            'title' => 'How to contact customer support',
            'order' => 34,
        ]);

    }
}
