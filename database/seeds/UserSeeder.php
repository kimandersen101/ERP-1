<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Root User (Agent)
        User::create([
            'id' => 1,
            'firstname' => 'Demo',
            'lastname' => 'User',
            'email' => 'demo@springaquah.info',
            'password' => Hash::make('demo'),
            'is_test' => 1,
            'is_loyalty_member' => 1,
            'loyalty_discount_percent' => 10,
            'timezone' => 'Asia/Karachi'
        ]);

        // Kenny Lu (Global Support)
        User::create([
            'id' => 2,
            'parent_id' => 1,
            'firstname' => 'Kenny',
            'lastname' => 'Lu',
            'email' => 'kenny@springaquah.com',
            'phone' => '2069138888',
            'is_test' => 1,
            'is_loyalty_member' => 1,
            'loyalty_discount_percent' => 10,
            'password' => Hash::make('water'),
            'timezone' => 'Asia/Karachi'
        ]);

        // Aqeel Chishti (Team Support)
        User::create([
            'id' => 3,
            'parent_id' => 1,
            'firstname' => 'Aqeel',
            'lastname' => 'TeamSupport',
            'email' => 'mrj302@gmail.com',
            'phone' => '00923006674603',
            'is_test' => 1,
            'is_loyalty_member' => 1,
            'loyalty_discount_percent' => 10,
            'password' => Hash::make('water'),
            'timezone' => 'Asia/Karachi'
        ]);

        // Usman Afzal (Agent)
        User::create([
            'id' => 4,
            'parent_id' => 3,
            'firstname' => 'Usman',
            'lastname' => 'Agent',
            'email' => 'usman.afzal33@gmail.com',
            'phone' => '00923217666692',
            'is_test' => 1,
            'is_loyalty_member' => 1,
            'loyalty_discount_percent' => 10,
            'password' => Hash::make('water'),
            'timezone' => 'Asia/Karachi'
        ]);

        // Subhan Khalid (Agent)
        User::create([
            'id' => 5,
            'parent_id' => 4,
            'firstname' => 'Subhan',
            'lastname' => 'Agent',
            'email' => 'subhan.khalid402@gmail.com',
            'phone' => '00923367535412',
            'is_test' => 1,
            'is_loyalty_member' => 1,
            'loyalty_discount_percent' => 10,
            'password' => Hash::make('water'),
            'timezone' => 'Asia/Karachi'
        ]);

        // Aqeel Chishti (Agent)
        User::create([
            'id' => 6,
            'parent_id' => 5,
            'firstname' => 'Aqeel',
            'lastname' => 'Agent',
            'email' => 'mrj302@icloud.com',
            'phone' => '00923136674603',
            'is_test' => 1,
            'is_loyalty_member' => 1,
            'loyalty_discount_percent' => 10,
            'password' => Hash::make('water'),
            'timezone' => 'Asia/Karachi'
        ]);

        // Aqeel Chishti (Customer)
        User::create([
            'id' => 7,
            'parent_id' => 6,
            'firstname' => 'Aqeel',
            'lastname' => 'Customer',
            'email' => 'mrj302@outlook.com',
            'phone' => '00923004518604',
            'is_test' => 1,
            'is_loyalty_member' => 1,
            'loyalty_discount_percent' => 10,
            'password' => Hash::make('water'),
            'timezone' => 'Asia/Karachi'
        ]);

        User::create([
            'id' => 8,
            'parent_id' => 2,
            'firstname' => 'iPhone',
            'lastname' => 'Upline1',
            'email' => 'iphoneupline1@springaqua.com',
            'phone' => '',
            'is_test' => 1,
            'is_loyalty_member' => 1,
            'loyalty_discount_percent' => 10,
            'password' => Hash::make('water'),
            'timezone' => 'Asia/Karachi'
        ]);

        User::create([
            'id' => 9,
            'parent_id' => 8,
            'firstname' => 'iPhone 1',
            'lastname' => '',
            'email' => 'iphone1@springaqua.com',
            'phone' => '',
            'is_test' => 1,
            'is_loyalty_member' => 1,
            'loyalty_discount_percent' => 10,
            'password' => Hash::make('water'),
            'timezone' => 'Asia/Karachi'
        ]);

        User::create([
            'id' => 10,
            'parent_id' => 9,
            'firstname' => 'iPhone 2',
            'lastname' => '',
            'email' => 'iphone2@sprngaqua.com',
            'phone' => '',
            'is_test' => 1,
            'is_loyalty_member' => 1,
            'loyalty_discount_percent' => 10,
            'password' => Hash::make('water'),
            'timezone' => 'Asia/Karachi'
        ]);

        User::create([
            'id' => 11,
            'parent_id' => 8,
            'firstname' => 'ANDROID 1',
            'lastname' => '',
            'email' => 'android1@sprngaqua.com',
            'phone' => '',
            'is_test' => 1,
            'is_loyalty_member' => 1,
            'loyalty_discount_percent' => 10,
            'password' => Hash::make('water'),
            'timezone' => 'Asia/Karachi'
        ]);

        User::create([
            'id' => 12,
            'parent_id' => 2,
            'firstname' => 'Android',
            'lastname' => 'Upline 1',
            'email' => 'androidupline1@springaqua.com',
            'phone' => '',
            'is_test' => 1,
            'is_loyalty_member' => 1,
            'loyalty_discount_percent' => 10,
            'password' => Hash::make('water'),
            'timezone' => 'Asia/Karachi'
        ]);

        User::create([
            'id' => 13,
            'parent_id' => 12,
            'firstname' => 'Android 2',
            'lastname' => '',
            'email' => 'android2@springaqua.com',
            'phone' => '',
            'is_test' => 1,
            'is_loyalty_member' => 1,
            'loyalty_discount_percent' => 10,
            'password' => Hash::make('water'),
            'timezone' => 'Asia/Karachi'
        ]);

        User::create([
            'id' => 14,
            'parent_id' => 13,
            'firstname' => 'Android 3',
            'lastname' => '',
            'email' => 'android3@springaqua.com',
            'phone' => '',
            'is_test' => 1,
            'is_loyalty_member' => 1,
            'loyalty_discount_percent' => 10,
            'password' => Hash::make('water'),
            'timezone' => 'Asia/Karachi'
        ]);

        User::create([
            'id' => 15,
            'parent_id' => 12,
            'firstname' => 'iPhone 3',
            'lastname' => '',
            'email' => 'iphone3@springaqua.com',
            'phone' => '',
            'is_test' => 1,
            'is_loyalty_member' => 1,
            'loyalty_discount_percent' => 10,
            'password' => Hash::make('water'),
            'timezone' => 'Asia/Karachi'
        ]);

        User::create([
            'id' => 16,
            'parent_id' => 2,
            'firstname' => 'iPhone 4',
            'lastname' => '',
            'email' => 'iphone4@springaqua.com',
            'phone' => '',
            'is_test' => 1,
            'is_loyalty_member' => 1,
            'loyalty_discount_percent' => 10,
            'password' => Hash::make('water'),
            'timezone' => 'Asia/Karachi'
        ]);

        User::create([
            'id' => 17,
            'parent_id' => 16,
            'firstname' => 'iPhone 5',
            'lastname' => '',
            'email' => 'iphone5@springaqua.com',
            'phone' => '',
            'is_test' => 1,
            'is_loyalty_member' => 1,
            'loyalty_discount_percent' => 10,
            'password' => Hash::make('water'),
            'timezone' => 'Asia/Karachi'
        ]);
    }
}
