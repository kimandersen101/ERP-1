<?php

use Illuminate\Database\Seeder;
use App\Order;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Order::create([
            'id' => 1,
            'user_id' => 1,
            'actor_id' => 1,
            'discount' => 10,
            'shipping_discount' => 10,
            'tax' => 100,
            'subtotal' => 123,
            'shipping_price' => 123,
            'total' => 222,
            'loyalty_discount_percent' => 5,
            'status' => 'APP_FINANCING',
            'payment_method' => 'BANK_FINANCING'

        ]);

		Order::create([
            'id' => 2,
            'user_id' => 2,
            'actor_id' => 2,
            'discount' => 10,
            'shipping_discount' => 10,
            'tax' => 100,
            'subtotal' => 123,
            'shipping_price' => 123,
            'total' => 222,
            'loyalty_discount_percent' => 5,
            'status' => 'APP_FINANCING',
            'payment_method' => 'BANK_FINANCING'
        ]);

		Order::create([
            'id' => 3,
            'user_id' => 3,
            'actor_id' => 3,
            'discount' => 10,
            'shipping_discount' => 10,
            'tax' => 100,
            'subtotal' => 123,
            'shipping_price' => 123,
            'total' => 222,
            'loyalty_discount_percent' => 5,
            'status' => 'DOCUMENT_SIGNING',
            'payment_method' => 'BANK_FINANCING'
        ]);

		Order::create([
            'id' => 4,
            'user_id' => 1,
            'actor_id' => 1,
            'discount' => 5,
            'shipping_discount' => 5,
            'tax' => 100,
            'subtotal' => 123,
            'shipping_price' => 123,
            'total' => 222,
            'loyalty_discount_percent' => 5,
            'status' => 'CHECK_CLEARING',
            'payment_method' => 'CHECK'
        ]);

		Order::create([
            'id' => 5,
            'user_id' => 3,
            'actor_id' => 3,
            'tax' => 100,
            'subtotal' => 123,
            'shipping_price' => 123,
            'total' => 222,
            'loyalty_discount_percent' => 5,
            'status' => 'PACKING',
            'payment_method' => 'CARD'
        ]);

		Order::create([
            'id' => 6,
            'user_id' => 1,
            'actor_id' => 1,
            'discount' => 10,
            'shipping_discount' => 10,
            'tax' => 100,
            'subtotal' => 123,
            'shipping_price' => 123,
            'total' => 222,
            'loyalty_discount_percent' => 5,
            'status' => 'SHIPPING',
            'payment_method' => 'CARD'
        ]);

		Order::create([
            'id' => 7,
            'user_id' => 2,
            'actor_id' => 2,
            'tax' => 100,
            'subtotal' => 123,
            'shipping_price' => 123,
            'total' => 222,
            'loyalty_discount_percent' => 5,
            'status' => 'APT_SCHEDULING',
            'payment_method' => 'CARD'
        ]);

		Order::create([
            'id' => 8,
            'user_id' => 1,
            'actor_id' => 1,
            'discount' => 10,
            'shipping_discount' => 10,
            'tax' => 100,
            'subtotal' => 123,
            'shipping_price' => 123,
            'total' => 222,
            'loyalty_discount_percent' => 5,
            'status' => 'INSTALLING',
            'payment_method' => 'CARD'
        ]);

		Order::create([
            'id' => 9,
            'user_id' => 3,
            'actor_id' => 3,
            'discount' => 10,
            'shipping_discount' => 10,
            'tax' => 100,
            'subtotal' => 123,
            'shipping_price' => 123,
            'total' => 222,
            'loyalty_discount_percent' => 5,
            'status' => 'FUNDING',
            'payment_method' => 'BANK_FINANCING'
        ]);

		Order::create([
            'id' => 10,
            'user_id' => 2,
            'actor_id' => 2,
            'tax' => 100,
            'subtotal' => 123,
            'shipping_price' => 123,
            'total' => 222,
            'loyalty_discount_percent' => 5,
            'status' => 'CANCELLED',
            'payment_method' => 'CARD'
        ]);

		Order::create([
            'id' => 11,
            'user_id' => 2,
            'actor_id' => 2,
            'discount' => 10,
            'shipping_discount' => 10,
            'tax' => 100,
            'subtotal' => 123,
            'shipping_price' => 123,
            'total' => 222,
            'loyalty_discount_percent' => 5,
            'status' => 'FULFILLED',
            'payment_method' => 'CARD'
        ]);
    }
}
