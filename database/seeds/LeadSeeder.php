<?php

use Illuminate\Database\Seeder;
use App\Lead;

class LeadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Demo User
        Lead::create([
            'user_id' => 1,
            'uid' => 'Rx9e70FrG0m',
            'relation' => 'FRIEND_FAMILY'
        ]);

        // Kenny Lu (Global Support)
        Lead::create([
            'user_id' => 2,
            'uid' => 'MWQyc880ZAJ',
            'relation' => 'FRIEND_FAMILY'
        ]);

        // Aqeel TeamSupport (Team Support)
        Lead::create([
            'user_id' => 3,
            'uid' => 'K7DFe9N7wkZ',
            'relation' => 'FRIEND_FAMILY'
        ]);

        // Usman Afzal (Agent)
        Lead::create([
            'user_id' => 4,
            'uid' => '9N7wkZK7DFe',
            'relation' => 'FRIEND_FAMILY'
        ]);

        // Subhan Khalid (Agent)
        Lead::create([
            'user_id' => 5,
            'uid' => '9NkZK7DFe7w',
            'relation' => 'FRIEND_FAMILY'
        ]);

        // Aqeel Chishti (Agent)
        Lead::create([
            'user_id' => 6,
            'uid' => 'kZK7DFe9N7w',
            'relation' => 'FRIEND_FAMILY'
        ]);

        // Aqeel Chishti (Customer)
        Lead::create([
            'user_id' => 7,
            'uid' => '9N7ZK7wkDFe',
            'relation' => 'FRIEND_FAMILY'
        ]);

        Lead::create([
            'user_id' => 8,
            'uid' => '9NK7wkhhfa',
            'relation' => 'FRIEND_FAMILY'
        ]);

        Lead::create([
            'user_id' => 9,
            'uid' => '9NK7wkbhfa',
            'relation' => 'FRIEND_FAMILY'
        ]);

        Lead::create([
            'user_id' => 10,
            'uid' => '9NK7wkfhfa',
            'relation' => 'FRIEND_FAMILY'
        ]);

        Lead::create([
            'user_id' => 11,
            'uid' => '9NKhwkhhfa',
            'relation' => 'FRIEND_FAMILY'
        ]);

        Lead::create([
            'user_id' => 12,
            'uid' => '9NK7wkhhsfa',
            'relation' => 'FRIEND_FAMILY'
        ]);

        Lead::create([
            'user_id' => 13,
            'uid' => '9NK7wkhjffa',
            'relation' => 'FRIEND_FAMILY'
        ]);

        Lead::create([
            'user_id' => 14,
            'uid' => '9NK7wsdfhfa',
            'relation' => 'FRIEND_FAMILY'
        ]);

        Lead::create([
            'user_id' => 15,
            'uid' => '9NK7sdfhhfa',
            'relation' => 'FRIEND_FAMILY'
        ]);

        Lead::create([
            'user_id' => 16,
            'uid' => 'asdjjggdff',
            'relation' => 'FRIEND_FAMILY'
        ]);

        Lead::create([
            'user_id' => 17,
            'uid' => '9NK7hfsfhfa',
            'relation' => 'FRIEND_FAMILY'
        ]);
    }
}
