<?php

namespace Database\Seeders;

use App\Models\Configuration;
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
        Configuration::insert([
            "entreprise_name" => 'GBM SA.',
            "telephone" => '99999999',
            "adress" => 'Ouagadougou',
            "email" => 'email@email.com'
        )];
    }
}
