<?php

use Illuminate\Database\Seeder;
Use App\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Customer
        Role::create([
            'id' => 1,
            'key' => 'customer',
            'name' => 'Customer',
            'order' => 1
        ]);

        // Agent
        Role::create([
            'id' => 2,
            'key' => 'agent',
            'name' => 'Agent',
            'order' => 2
        ]);

        // Affiliate
        Role::create([
            'id' => 3,
            'key' => 'affiliate',
            'name' => 'Affiliate',
            'order' => 3
        ]);

        // LMS Manager
        Role::create([
            'id' => 4,
            'key' => 'lms-manager',
            'name' => 'LMS Manager',
            'order' => 4
        ]);

        // Super Admin
        Role::create([
            'id' => 5,
            'key' => 'admin',
            'name' => 'Admin',
            'order' => 5
        ]);

        // Lead
        Role::create([
            'id' => 6,
            'key' => 'lead',
            'name' => 'Lead',
            'order' => 6
        ]);

        // Team Support
        Role::create([
            'id' => 7,
            'key' => 'team-support',
            'name' => 'Team Support',
            'order' => 7
        ]);

        // Team Support
        Role::create([
            'id' => 8,
            'key' => 'global-support',
            'name' => 'Global Support',
            'order' => 8
        ]);
    }
}
