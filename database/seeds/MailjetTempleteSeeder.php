<?php

use Illuminate\Database\Seeder;
use App\MailjetTemplate;

class MailjetTempleteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MailjetTemplate::create([
            'id' => 897941,
            'type' => 'password_reset'
        ]);

        MailjetTemplate::create([
            'id' => 897966,
            'type' => 'new_account_setup'
        ]);

        MailjetTemplate::create([
            'id' => 897973,
            'type' => 'account_expired_failed_payment'
        ]);

        MailjetTemplate::create([
            'id' => 897983,
            'type' => 'credit_card_expiring'
        ]);

        MailjetTemplate::create([
            'id' => 1100803,
            'type' => 'shipping_tracking_information'
        ]);

        MailjetTemplate::create([
            'id' => 1126593,
            'type' => 'support_ticket_reply'
        ]);

        MailjetTemplate::create([
            'id' => 1192555,
            'type' => 'new_renwal_task'
        ]);

        MailjetTemplate::create([
            'id' => 1417656,
            'type' => 'p1_filter_renewal'
        ]);

        MailjetTemplate::create([
            'id' => 1417659,
            'type' => 'filters_renewal'
        ]);

        MailjetTemplate::create([
            'id' => 1419445,
            'type' => 'shower_filter'
        ]);

        MailjetTemplate::create([
            'id' => 1611722,
            'type' => 'order_receipt'
        ]);
    }
}
