<?php

namespace Database\Seeders;

use App\Models\Configuration;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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
            "entreprise_name" => 'GBM SA.',
            "telephone" => '99999999',
            "adress" => 'Ouagadougou',
            "email" => 'email@email.com'
        ];

        $query = new Configuration();
        $query->save();
    }
}
