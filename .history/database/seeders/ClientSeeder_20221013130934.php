<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
{
    Client::insert([
        [
            'id' => 1,
            'num_cli' => 'Les rondins du lac',
            'name' => 'Un emplacement de rêve',
            'first_phone' => 'Une vue inégalée',
            'secobd_phone' => 'Un calme absolu',
            'date_naiss' => Carbon::now()->subDays(100)->toDateTimeString(),
            'numb_cnib' => 'B365478',
            'montant_demande' => '100000',
            'status' => 0,
            'genre' => 'Masculin',
            'user_id' => 1,
        ],
        [
            'id' => 2,
            'title' => 'L\'avenir est déjà là',
            'text1' => 'Une architecture unique',
            'text2' => 'Une piscine langoureuse',
            'text3' => 'Une lumière enchanteresse',
            'image' => 'gite2.jpg',
        ],
    ]);
}
}
