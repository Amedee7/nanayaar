<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'firstname' => 'COMPAORE',
                'lastname' => 'ASMON',
                'telephone' => '73942934',
                'email' => 'compareasmon@gmail.com',
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
            ],
            [
                'firstname' => 'OUEDRAOGO',
                'lastname' => 'Amedee',
                'telephone' => '65530101',
                'email' => 'amedeeouedraogo01@gmail.com',
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
            ],
            [
                'firstname' => 'Toe',
                'lastname' => 'Joel',
                'telephone' => '05478963',
                'email' => 'joel@gmail.com',
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
            ],
            [
                'firstname' => 'Tapsoba',
                'lastname' => 'Azeta',
                'telephone' => '66998532',
                'email' => 'azeta@gmail.com',
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
            ],
            [
                'firstname' => 'OUEDRAOGO',
                'lastname' => 'Amedee',
                'telephone' => '65530101',
                'email' => 'amedeeouedraogo01@gmail.com',
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
            ]
        ];

        $role = Role::where('name', 'super-administrateur')->first();
        foreach ($users as $user) {
            $user = \App\Models\User::create($user);
            $user->attachRole($role);
        }
    }
}
