<?php

use Illuminate\Database\Seeder;
use App\RoleUser;

class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Demo User Roles
        RoleUser::create([
            'user_id' => 1,
            'role_id' => 2,
        ]);

        // Kenny Lu (Agent)
        RoleUser::create([
            'user_id' => 2,
            'role_id' => 2,
        ]);

        // Kenny Lu (Admin)
        RoleUser::create([
            'user_id' => 2,
            'role_id' => 5,
        ]);

        // Kenny Lu (Global Support)
        RoleUser::create([
            'user_id' => 2,
            'role_id' => 8,
        ]);


        // Aqeel TeamSupport (Agent)
        RoleUser::create([
            'user_id' => 3,
            'role_id' => 2,
        ]);

        // Aqeel TeamSupport (Team Support)
        RoleUser::create([
            'user_id' => 3,
            'role_id' => 7,
        ]);

        // Aqeel TeamSupport (Admin)
        RoleUser::create([
            'user_id' => 3,
            'role_id' => 5,
        ]);


        // Usman Afzal (Agent)
        RoleUser::create([
            'user_id' => 4,
            'role_id' => 2,
        ]);


         // Subhan Khalid (Agent)
        RoleUser::create([
            'user_id' => 5,
            'role_id' => 2,
        ]);


        // Aqeel Agent (Agent)
        RoleUser::create([
            'user_id' => 6,
            'role_id' => 2,
        ]);

        // Aqeel Customer (Customer)
        RoleUser::create([
            'user_id' => 7,
            'role_id' => 1,
        ]);

        RoleUser::create([
            'user_id' => 8,
            'role_id' => 1,
        ]);

        RoleUser::create([
            'user_id' => 8,
            'role_id' => 2,
        ]);


        RoleUser::create([
            'user_id' => 8,
            'role_id' => 7,
        ]);

        RoleUser::create([
            'user_id' => 9,
            'role_id' => 1,
        ]);

        RoleUser::create([
            'user_id' => 9,
            'role_id' => 2,
        ]);

        RoleUser::create([
            'user_id' => 10,
            'role_id' => 1,
        ]);

        RoleUser::create([
            'user_id' => 10,
            'role_id' => 2,
        ]);


        RoleUser::create([
            'user_id' => 11,
            'role_id' => 1,
        ]);

        RoleUser::create([
            'user_id' => 11,
            'role_id' => 2,
        ]);

        RoleUser::create([
            'user_id' => 12,
            'role_id' => 1,
        ]);

        RoleUser::create([
            'user_id' => 12,
            'role_id' => 2,
        ]);

        RoleUser::create([
            'user_id' => 12,
            'role_id' => 7,
        ]);

        RoleUser::create([
            'user_id' => 13,
            'role_id' => 1,
        ]);

        RoleUser::create([
            'user_id' => 13,
            'role_id' => 2,
        ]);


        RoleUser::create([
            'user_id' => 14,
            'role_id' => 1,
        ]);

        RoleUser::create([
            'user_id' => 14,
            'role_id' => 2,
        ]);

        RoleUser::create([
            'user_id' => 15,
            'role_id' => 1,
        ]);

        RoleUser::create([
            'user_id' => 15,
            'role_id' => 2,
        ]);

        RoleUser::create([
            'user_id' => 16,
            'role_id' => 1,
        ]);

        RoleUser::create([
            'user_id' => 16,
            'role_id' => 2,
        ]);


        RoleUser::create([
            'user_id' => 17,
            'role_id' => 1,
        ]);

        RoleUser::create([
            'user_id' => 17,
            'role_id' => 2,
        ]);
    }
}
