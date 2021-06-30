<?php

use Illuminate\Database\Seeder;
use App\UserAddress;

class UserAddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserAddress::create([
            'user_id' => 1,
            'state_id' => 5,
            'city' => 'Tempe',
            'zip' => '85281',
            'street' => '140 E. Rio Salado Pkwy',
        ]);

        UserAddress::create([
            'user_id' => 2,
            'state_id' => 12,
            'city' => 'Pooler',
            'zip' => '31322',
            'street' => '1241 Djs Way'
        ]);

        UserAddress::create([
            'user_id' => 3,
            'state_id' => 36,
            'city' => ' New York',
            'zip' => '10011',
            'street' => '47 W 13th St'
        ]);
    }
}
