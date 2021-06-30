<?php

use Illuminate\Database\Seeder;
use App\Product;
use App\Promo;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Ultimate System
        Product::create([
            'id' => 1,
            'key' => 'ultimate-system',
            'name' => 'Ultimate Hydration System',
            'type' => 'MACHINE',
            'technology' => 'WET 7',
            'generation' => '2',
            'price' => 3545,
            'shipping_price' => 75,
            'image' => 'products/ultimate.png',
            'is_installable' => true
        ]);

        // RV System
        Product::create([
            'id' => 2,
            'key' => 'rv-system',
            'name' => 'RV / HOME Drinking System',
            'type' => 'MACHINE',
            'technology' => 'WET 3',
            'generation' => '2',
            'price' => 1545,
            'shipping_price' => 50,
            'image' => 'products/rv.png',
            'is_installable' => true
        ]);

        // Sub Products of Red & Gold Machine
        Product::create([
            'key' => 'faucet',
            'name' => 'Stainless Steel Faucet',
            'type' => 'ADDON',
            'price' => 250,
            'image' => 'products/faucet.png',
        ]);

        Product::create([
            'key' => 'ultimate-renewal-filters',
            'name' => 'Ultimate Renewal Filters',
            'type' => 'RENEWAL_FILTER',
            'price' => 375,
            'validity_months' => 18,
            'renewal_shipping_price' => 24.95,
            'image' => 'products/ultimate.png'
        ]);

        Product::create([
            'key' => 'rv-renewal-filters',
            'name' => 'RV Renewal Filters',
            'type' => 'RENEWAL_FILTER',
            'price' => 225,
            'validity_months' => 12,
            'shipping_price' => 24.95,
            'image' => 'products/rv.png'
        ]);

        Product::create([
            'key' => 'p1-filter',
            'name' => 'P1 Filter',
            'type' => 'PRESET_FILTER',
            'price' => 22,
            'promo_id' => 2,
            'shipping_price' => 9.95,
            'renewal_shipping_price' => 4.99,
            'image' => 'products/p1.png'
        ]);

        Product::create([
            'key' => 'p2-p3-filters',
            'name' => 'P2 + P3 Filters',
            'type' => 'PRESET_FILTER',
            'price' => 40,
            'promo_id' => 2,
            'shipping_price' => 5,
            'image' => 'products/p2-p3.png'

        ]);

        Product::create([
            'key' => 'p2-p3-p4-p5-filters',
            'name' => 'P2 + P3 + P4 + P5 Filters',
            'type' => 'PRESET_FILTER',
            'price' => 120,
            'promo_id' => 2,
            'shipping_price' => 10,
            'image' => 'products/p2-p3-p4-p5.png'
        ]);

        Product::create([
            'key' => 'p5-filter',
            'name' => 'P5 Filter',
            'type' => 'PRESET_FILTER',
            'price' => 30,
            'promo_id' => 2,
            'shipping_price' => 5,
            'image' => 'products/p5.png'
        ]);

        Product::create([
            'key' => 'p5x-filter',
            'name' => 'P5X Filter',
            'type' => 'PRESET_FILTER',
            'price' => 100,
            'promo_id' => 2,
            'shipping_price' => 5,
            'image' => 'products/p5x.png'
        ]);

        Product::create([
            'key' => 'traveling-kit',
            'name' => 'Traveling Kit',
            'type' => 'ACCESSORY',
            'price' => 250,
            'image' => 'products/traveling-kit.png'
        ]);

         Product::create([
            'key' => 'shower-filter',
            'name' => 'Shower Filter',
            'type' => 'ACCESSORY',
            'technology' => '',
            'generation' => '',
            'price' => 105,
            'promo_id' => 1,
            'validity_months' => 6,
            'shipping_price' => 9.95,
            'renewal_shipping_price' => 9.95,
            'image' => 'products/shower-filter.png'
        ]);

        //one time setup product
        Product::create([
            'key' => 'one-time-account-setup',
            'name' => 'One-time Account Setup',
            'type' => 'MEMBERSHIP',
            'price' => 25,
        ]);



        Promo::where('id', 7)->update(['product_id' => 12]);
    }
}
