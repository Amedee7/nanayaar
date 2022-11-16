<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
{
    Home::insert([
        [
            'id' => 1,
            'num_cli' => 'Les rondins du lac',
            'name' => 'Un emplacement de rêve',
            'first_phone' => 'Une vue inégalée',
            'secobd_phone' => 'Un calme absolu',
            'date_naiss' => 'gite1.jpg',
            'numb_cnib' => 'gite1.jpg',
            'montant_demande' => 'gite1.jpg',
            'status' => 'gite1.jpg',
            'genre' => 'gite1.jpg',
            'montant_demande' => 'gite1.jpg',
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
