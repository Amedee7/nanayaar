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
            [
                "entreprise_name" => 'GBM SA.',
                "telephone" => '+22625364143',
                "adress" => 'Ouagadougou',
                "email" => 'gbm@email.com',
            ]
        ]);
    }
}
