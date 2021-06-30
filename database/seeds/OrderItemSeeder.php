<?php

use Illuminate\Database\Seeder;
use App\OrderItem;

class OrderItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        OrderItem::create([
			'id' => 1,
			'order_id' => 1,
			'product_id' => 1,
			'user_address_id' => 1,
			'household_size' => 1,
			'nickname' => 'Kitchen',
			'is_well_water' => true,
			'has_filtration_system' => true,
			'has_micron_system' => true,
			'install_option' => 'DIY',
			'zone' => 3,
            'p1_validity_months' => 3,
			'subtotal' => 3450,
			'tax_percent' => 8.6,
			'tax' => 100,
			'shipping_price' => 120,
		]);

		OrderItem::create([
			'id' => 2,
			'order_id' => 2,
			'product_id' => 2,
			'user_address_id' => 1,
			'household_size' => 1,
			'nickname' => 'Kitchen',
			'is_well_water' => true,
			'has_filtration_system' => true,
			'has_micron_system' => true,
			'install_option' => 'DIY',
			'zone' => 3,
            'p1_validity_months' => 3,
			'subtotal' => 3450,
			'tax_percent' => 8.6,
			'tax' => 100,
			'shipping_price' => 120,
		]);

		OrderItem::create([
			'id' => 3,
			'order_id' => 3,
			'product_id' => 1,
			'user_address_id' => 1,
			'household_size' => 1,
			'nickname' => 'Kitchen',
			'is_well_water' => true,
			'has_filtration_system' => true,
			'has_micron_system' => true,
			'install_option' => 'DIY',
			'zone' => 3,
            'p1_validity_months' => 3,
			'subtotal' => 3450,
			'tax_percent' => 8.6,
			'tax' => 100,
			'shipping_price' => 120,
		]);

		OrderItem::create([
			'id' => 4,
			'order_id' => 4,
			'product_id' => 1,
			'user_address_id' => 1,
			'household_size' => 1,
			'nickname' => 'Kitchen',
			'is_well_water' => true,
			'has_filtration_system' => true,
			'has_micron_system' => true,
			'install_option' => 'DIY',
			'zone' => 3,
            'p1_validity_months' => 3,
			'subtotal' => 3450,
			'tax_percent' => 8.6,
			'tax' => 100,
			'shipping_price' => 120,
		]);

		OrderItem::create([
			'id' => 5,
			'order_id' => 5,
			'product_id' => 2,
			'user_address_id' => 1,
			'household_size' => 1,
			'nickname' => 'Kitchen',
			'is_well_water' => true,
			'has_filtration_system' => true,
			'has_micron_system' => true,
			'install_option' => 'DIY',
			'zone' => 3,
            'p1_validity_months' => 3,
			'subtotal' => 3450,
			'tax_percent' => 8.6,
			'tax' => 100,
			'shipping_price' => 120,
		]);

		OrderItem::create([
			'id' => 6,
			'order_id' => 6,
			'product_id' => 2,
			'user_address_id' => 1,
			'household_size' => 1,
			'nickname' => 'Kitchen',
			'is_well_water' => true,
			'has_filtration_system' => true,
			'has_micron_system' => true,
			'install_option' => 'DIY',
			'zone' => 3,
            'p1_validity_months' => 3,
			'subtotal' => 3450,
			'tax_percent' => 8.6,
			'tax' => 100,
			'shipping_price' => 120,
		]);

		OrderItem::create([
			'id' => 7,
			'order_id' => 7,
			'product_id' => 1,
			'user_address_id' => 1,
			'household_size' => 1,
			'nickname' => 'Kitchen',
			'is_well_water' => true,
			'has_filtration_system' => true,
			'has_micron_system' => true,
			'install_option' => 'DIY',
			'zone' => 3,
            'p1_validity_months' => 3,
			'subtotal' => 3450,
			'tax_percent' => 8.6,
			'tax' => 100,
			'shipping_price' => 120,
		]);

		OrderItem::create([
			'id' => 8,
			'order_id' => 8,
			'product_id' => 1,
			'user_address_id' => 1,
			'household_size' => 1,
			'nickname' => 'Kitchen',
			'is_well_water' => true,
			'has_filtration_system' => true,
			'has_micron_system' => true,
			'install_option' => 'DIY',
			'zone' => 3,
            'p1_validity_months' => 3,
			'subtotal' => 3450,
			'tax_percent' => 8.6,
			'tax' => 100,
			'shipping_price' => 120,
		]);

		OrderItem::create([
			'id' => 9,
			'order_id' => 9,
			'product_id' => 2,
			'user_address_id' => 1,
			'household_size' => 1,
			'nickname' => 'Kitchen',
			'is_well_water' => true,
			'has_filtration_system' => true,
			'has_micron_system' => true,
			'install_option' => 'DIY',
			'zone' => 3,
            'p1_validity_months' => 3,
			'subtotal' => 3450,
			'tax_percent' => 8.6,
			'tax' => 100,
			'shipping_price' => 120,
		]);

		OrderItem::create([
			'id' => 10,
			'order_id' => 10,
			'product_id' => 2,
			'user_address_id' => 1,
			'household_size' => 1,
			'nickname' => 'Kitchen',
			'is_well_water' => true,
			'has_filtration_system' => true,
			'has_micron_system' => true,
			'install_option' => 'DIY',
			'zone' => 3,
            'p1_validity_months' => 3,
			'subtotal' => 3450,
			'tax_percent' => 8.6,
			'tax' => 100,
			'shipping_price' => 120,
		]);

		OrderItem::create([
			'id' => 11,
			'order_id' => 11,
			'product_id' => 1,
			'user_address_id' => 1,
			'household_size' => 1,
			'nickname' => 'Kitchen',
			'is_well_water' => true,
			'has_filtration_system' => true,
			'has_micron_system' => true,
			'install_option' => 'DIY',
			'zone' => 3,
            'p1_validity_months' => 3,
			'subtotal' => 3450,
			'tax_percent' => 8.6,
			'tax' => 100,
			'shipping_price' => 120,
		]);
    }
}
