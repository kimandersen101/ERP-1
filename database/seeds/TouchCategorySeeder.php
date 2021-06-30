<?php

use Illuminate\Database\Seeder;
use App\TouchCategory;

class TouchCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TouchCategory::create([
            'name' => 'Educational Videos',
            'funnel_step_id' => 1,
            'order' => 1
        ]);

        TouchCategory::create([
            'name' => 'FAQ',
            'funnel_step_id' => 2,
            'order' => 2
        ]);

        TouchCategory::create([
            'name' => 'Booklet',
            'funnel_step_id' => 3,
            'order' => 3
        ]);

        TouchCategory::create([
            'name' => 'Testimonial Videos',
            'funnel_step_id' => 4,
            'order' => 4
        ]);
    }
}
