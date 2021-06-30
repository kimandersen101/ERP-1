<?php

use Illuminate\Database\Seeder;
use App\Promo;

class PromoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Promo::create([
            'id' => 1,
            'key' => 'SYS50OFF',
            'name' => '50% off',
            'type' => 'PRICE',
            'discount_unit' => 'PERCENTAGE',
            'discount_value' => 50.00,
            'expired_at' => '2030-12-31'
        ]);

        Promo::create([
            'id' => 2,
            'key' => 'SYS100OFF',
            'name' => '100% off',
            'type' => 'PRICE',
            'discount_unit' => 'PERCENTAGE',
            'discount_value' => 100.00,
            'expired_at' => '2030-12-31'
        ]);

        Promo::create([
            'id' => 3,
            'key' => 'SYS200OFF',
            'name' => '$200 off',
            'type' => 'PRICE',
            'discount_unit' => 'AMOUNT',
            'discount_value' => 200.00,
            'expired_at' => '2030-12-31'
        ]);

        Promo::create([
            'id' => 4,
            'key' => 'SYS10OFF',
            'name' => '10% off',
            'type' => 'PRICE',
            'discount_unit' => 'PERCENTAGE',
            'discount_value' => 10.00,
            'expired_at' => '2030-12-31'
        ]);

        Promo::create([
            'id' => 5,
            'key' => 'SYS5OFF',
            'name' => '5% off',
            'type' => 'PRICE',
            'discount_unit' => 'PERCENTAGE',
            'discount_value' => 5.00,
            'expired_at' => '2030-12-31'
        ]);

        Promo::create([
            'id' => 6,
            'key' => 'USER100USDOFF',
            'name' => '$100 Off Event Promo',
            'type' => 'PRICE',
            'discount_unit' => 'AMOUNT',
            'discount_value' => 100.00,
            'expired_at' => '2030-12-31'
        ]);

        Promo::create([
            'id' => 7,
            'key' => 'USERFREESHOWERFILTER',
            'name' => 'Free Shower Filter Event Promo',
            'type' => 'PRODUCT',
            'discount_unit' => 'PERCENTAGE',
            'discount_value' => 100.00,
            'expired_at' => '2030-12-31'
        ]);

    }
}
