<?php

use Illuminate\Database\Seeder;
use App\CommissionDefault;

class CommissionDefaultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* Purchase Commission */

        // Ultimate Hydration System
        CommissionDefault::create([
			'product_id' => 1,
			'role' => 'AGENT',
			'key' => 'dc',
			'title' => 'Direct Commission',
			'amount' => 700.00
        ]);

		CommissionDefault::create([
			'product_id' => 1,
			'role' => 'AGENT',
			'key' => 'oc1',
			'title' => '1st over-ride',
			'amount' => 200.00
        ]);

		CommissionDefault::create([
			'product_id' => 1,
			'role' => 'AGENT',
			'key' => 'oc2',
			'title' => '2nd over-ride',
			'amount' => 100.00
        ]);

		CommissionDefault::create([
			'product_id' => 1,
			'role' => 'AFFILIATE',
			'key' => 'dc',
			'title' => 'Direct Commission',
			'amount' => 350.00
        ]);

		CommissionDefault::create([
			'product_id' => 1,
			'role' => 'AFFILIATE',
			'key' => 'oc1',
			'title' => '1st over-ride',
			'amount' => 100.00
        ]);

		CommissionDefault::create([
			'product_id' => 1,
			'role' => 'AFFILIATE',
			'key' => 'oc2',
			'title' => '2nd over-ride',
			'amount' => 50.00
        ]);

		CommissionDefault::create([
			'product_id' => 1,
			'role' => 'AGENT',
			'key' => 'dc-handoff',
			'title' => 'Handoff Direct Commission',
			'amount' => 500.00
        ]);

		CommissionDefault::create([
			'product_id' => 1,
			'role' => 'AGENT',
			'key' => 'dc-handoff-support',
			'title' => 'Handoff Direct Commission Team Support',
			'amount' => 200.00
        ]);


		CommissionDefault::create([
			'product_id' => 1,
			'role' => 'AFFILIATE',
			'key' => 'dc-handoff',
			'title' => 'Handoff Direct Commission',
			'amount' => 250.00
        ]);

		CommissionDefault::create([
			'product_id' => 1,
			'role' => 'AFFILIATE',
			'key' => 'dc-handoff-support',
			'title' => 'Handoff Direct Commission Team Support',
			'amount' => 200.00
        ]);

		CommissionDefault::create([
			'product_id' => 1,
			'role' => 'AGENT',
			'key' => 'dc-handoff-ready-to-buy',
			'title' => 'Handoff Direct Commission',
			'amount' => 700.00
        ]);

		CommissionDefault::create([
			'product_id' => 1,
			'role' => 'AFFILIATE',
			'key' => 'dc-handoff-ready-to-buy',
			'title' => 'Handoff Direct Commission',
			'amount' => 450.00
        ]);


		// RV / HOME Drinking System
        CommissionDefault::create([
			'product_id' => 2,
			'role' => 'AGENT',
			'key' => 'dc',
			'title' => 'Direct Commission',
			'amount' => 700.00
        ]);

		CommissionDefault::create([
			'product_id' => 2,
			'role' => 'AGENT',
			'key' => 'oc1',
			'title' => '1st over-ride',
			'amount' => 200.00
        ]);

		CommissionDefault::create([
			'product_id' => 2,
			'role' => 'AGENT',
			'key' => 'oc2',
			'title' => '2nd over-ride',
			'amount' => 100.00
        ]);

		CommissionDefault::create([
			'product_id' => 2,
			'role' => 'AFFILIATE',
			'key' => 'dc',
			'title' => 'Direct Commission',
			'amount' => 350.00
        ]);

		CommissionDefault::create([
			'product_id' => 2,
			'role' => 'AFFILIATE',
			'key' => 'oc1',
			'title' => '1st over-ride',
			'amount' => 100.00
        ]);

		CommissionDefault::create([
			'product_id' => 2,
			'role' => 'AFFILIATE',
			'key' => 'oc2',
			'title' => '2nd over-ride',
			'amount' => 50.00
        ]);

		CommissionDefault::create([
			'product_id' => 2,
			'role' => 'AGENT',
			'key' => 'dc-handoff',
			'title' => 'Handoff Direct Commission',
			'amount' => 500.00
        ]);

		CommissionDefault::create([
			'product_id' => 2,
			'role' => 'AGENT',
			'key' => 'dc-handoff-support',
			'title' => 'Handoff Direct Commission Team Support',
			'amount' => 200.00
        ]);


		CommissionDefault::create([
			'product_id' => 2,
			'role' => 'AFFILIATE',
			'key' => 'dc-handoff',
			'title' => 'Handoff Direct Commission',
			'amount' => 250.00
        ]);

		CommissionDefault::create([
			'product_id' => 2,
			'role' => 'AFFILIATE',
			'key' => 'dc-handoff-support',
			'title' => 'Handoff Direct Commission Team Support',
			'amount' => 200.00
        ]);

		CommissionDefault::create([
			'product_id' => 2,
			'role' => 'AGENT',
			'key' => 'dc-handoff-ready-to-buy',
			'title' => 'Handoff Direct Commission',
			'amount' => 700.00
        ]);

		CommissionDefault::create([
			'product_id' => 2,
			'role' => 'AFFILIATE',
			'key' => 'dc-handoff-ready-to-buy',
			'title' => 'Handoff Direct Commission',
			'amount' => 450.00
        ]);

		/* Renewal Commission */

        // Ultimate Renewal Filters
		CommissionDefault::create([
			'product_id' => 4,
			'role' => 'AGENT',
			'key' => 'rdc',
			'title' => 'Renewal Direct Commission',
			'amount' => 5.00
        ]);

		CommissionDefault::create([
			'product_id' => 4,
			'role' => 'AFFILIATE',
			'key' => 'rdc',
			'title' => 'Renewal Direct Commission',
			'amount' => 5.00
        ]);

		CommissionDefault::create([
			'product_id' => 4,
			'role' => 'AGENT',
			'key' => 'roc1',
			'title' => 'Renewal First Override',
			'amount' => 2.00
        ]);

		CommissionDefault::create([
			'product_id' => 4,
			'role' => 'AFFILIATE',
			'key' => 'roc1',
			'title' => 'Renewal First Override',
			'amount' => 2.00
        ]);

		// RV Renewal Filters
        CommissionDefault::create([
			'product_id' => 5,
			'role' => 'AGENT',
			'key' => 'rdc',
			'title' => 'Renewal Direct Commission',
			'amount' => 5.00
        ]);

        CommissionDefault::create([
			'product_id' => 5,
			'role' => 'AFFILIATE',
			'key' => 'rdc',
			'title' => 'Renewal Direct Commission',
			'amount' => 5.00
        ]);

		CommissionDefault::create([
			'product_id' => 5,
			'role' => 'AGENT',
			'key' => 'roc1',
			'title' => 'Renewal First Override',
			'amount' => 2.00
        ]);

		CommissionDefault::create([
			'product_id' => 5,
			'role' => 'AFFILIATE',
			'key' => 'roc1',
			'title' => 'Renewal First Override',
			'amount' => 2.00
        ]);
    }
}
