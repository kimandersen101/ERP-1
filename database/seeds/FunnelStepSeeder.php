<?php

use Illuminate\Database\Seeder;
use App\FunnelStep;

class FunnelStepSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FunnelStep::create([
            'id' => 1,
            'key' => 'educational-videos',
            'name' => 'Educational Videos',
            'order' => 1
        ]);

        FunnelStep::create([
            'id' => 2,
            'key' => 'article',
            'name' => 'Article',
            'order' => 3
        ]);

        FunnelStep::create([
            'id' => 3,
            'key' => 'booklet',
            'name' => 'Booklet',
            'order' => 2
        ]);

        FunnelStep::create([
            'id' => 4,
            'key' => 'testimonial-videos',
            'name' => 'Testimonial Video',
            'order' => 4
        ]);
    }
}
