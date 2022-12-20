<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConfigurationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $configuration = [
            "entreprise_name" => 'Entreprise',
            "telephone" => '99999999',
            "adress" => 'Ouagadougou',
            "email" => 'email@email.com'
        ];

        $query = new Configuration();
        $query->save();
    }
}
