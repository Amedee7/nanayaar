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
                'firstname' => 'Konate Amadou',
                'lastname' => 'Joel',
                'telephone' => '05478963',
                'email' => 'joel@gmail.com',
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
            ],
            [
                'firstname' => 'Minoungou/Kietega',
                'lastname' => 'Aïda',
                'telephone' => '00000000',
                'email' => 'aida@gmail.com',
                'password' => Hash::make('Kietega@2022'),
                'remember_token' => Str::random(10),
            ],
            [
                'firstname' => 'Tiendrebeogo',
                'lastname' => 'Segolaine',
                'telephone' => '00000000',
                'email' => 'segolaine@gmail.com',
                'password' => Hash::make('Segolaine@2022'),
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
