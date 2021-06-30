<?php

use Illuminate\Database\Seeder;
use App\OrderItemDetail;

class OrderItemDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        OrderItemDetail::create([
            'order_item_id' => 1,
            'product_id' => 1,
            'price' => 3450,
            'shipping_price' => 120
        ]);

        OrderItemDetail::create([
            'order_item_id' => 1,
            'product_id' => 2,
            'price' => 30,
            'shipping_price' => 12
        ]);



        OrderItemDetail::create([
            'order_item_id' => 2,
            'product_id' => 1,
            'price' => 3450,
            'shipping_price' => 120
        ]);

        OrderItemDetail::create([
            'order_item_id' => 2,
            'product_id' => 2,
            'price' => 30,
            'shipping_price' => 12
        ]);





        OrderItemDetail::create([
            'order_item_id' => 2,
            'product_id' => 1,
            'price' => 3450,
            'shipping_price' => 120
        ]);

        OrderItemDetail::create([
            'order_item_id' => 2,
            'product_id' => 2,
            'price' => 30,
            'shipping_price' => 12
        ]);




        OrderItemDetail::create([
            'order_item_id' => 3,
            'product_id' => 1,
            'price' => 3450,
            'shipping_price' => 120
        ]);

        OrderItemDetail::create([
            'order_item_id' => 3,
            'product_id' => 2,
            'price' => 30,
            'shipping_price' => 12
        ]);





        OrderItemDetail::create([
            'order_item_id' => 4,
            'product_id' => 1,
            'price' => 3450,
            'shipping_price' => 120
        ]);

        OrderItemDetail::create([
            'order_item_id' => 4,
            'product_id' => 2,
            'price' => 30,
            'shipping_price' => 12
        ]);




        OrderItemDetail::create([
            'order_item_id' => 5,
            'product_id' => 1,
            'price' => 3450,
            'shipping_price' => 120
        ]);

        OrderItemDetail::create([
            'order_item_id' => 5,
            'product_id' => 2,
            'price' => 30,
            'shipping_price' => 12
        ]);




        OrderItemDetail::create([
            'order_item_id' => 6,
            'product_id' => 1,
            'price' => 3450,
            'shipping_price' => 120
        ]);

        OrderItemDetail::create([
            'order_item_id' => 6,
            'product_id' => 2,
            'price' => 30,
            'shipping_price' => 12
        ]);




        OrderItemDetail::create([
            'order_item_id' => 7,
            'product_id' => 1,
            'price' => 3450,
            'shipping_price' => 120
        ]);

        OrderItemDetail::create([
            'order_item_id' => 7,
            'product_id' => 2,
            'price' => 30,
            'shipping_price' => 12
        ]);




        OrderItemDetail::create([
            'order_item_id' => 8,
            'product_id' => 1,
            'price' => 3450,
            'shipping_price' => 120
        ]);

        OrderItemDetail::create([
            'order_item_id' => 8,
            'product_id' => 2,
            'price' => 30,
            'shipping_price' => 12
        ]);




        OrderItemDetail::create([
            'order_item_id' => 9,
            'product_id' => 1,
            'price' => 3450,
            'shipping_price' => 120
        ]);

        OrderItemDetail::create([
            'order_item_id' => 9,
            'product_id' => 2,
            'price' => 30,
            'shipping_price' => 12
        ]);




        OrderItemDetail::create([
            'order_item_id' => 10,
            'product_id' => 1,
            'price' => 3450,
            'shipping_price' => 120
        ]);

        OrderItemDetail::create([
            'order_item_id' => 10,
            'product_id' => 2,
            'price' => 30,
            'shipping_price' => 12
        ]);



        OrderItemDetail::create([
            'order_item_id' => 11,
            'product_id' => 1,
            'price' => 3450,
            'shipping_price' => 120
        ]);

        OrderItemDetail::create([
            'order_item_id' => 11,
            'product_id' => 2,
            'price' => 30,
            'shipping_price' => 12
        ]);
    }
}
