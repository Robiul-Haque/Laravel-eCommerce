<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'phone' => '01772782662',
            'address' => 'Westgoulchamot-1no sorok, Faridpur',
            'role' => 'admin',
            'password' => Hash::make('12345')
        ]);
        User::create([
            'name' => 'customer',
            'email' => 'customer@gmail.com',
            'phone' => '01772782662',
            'address' => 'Mirpur-2, Dhaka',
            'password' => Hash::make('12345')
        ]);
    }
}
