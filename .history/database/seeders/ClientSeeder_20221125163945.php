<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Client;
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
                'uuid' => 'a00a5dcb-f3ae-407a-bf28-1aa087892afc',
                'numb_cli' => '2022-1',
                'name' => 'Sawadogo',
                'lastname' => 'Lolo',
                'first_phone' => '70530101',
                'second_phone' => '73251446',
                'date_naiss' => Carbon::now()->subDays(100)->toDateTimeString(),
                'numb_cnib' => 'B365478',
                'montant_demande' => '100000',
                'status' => "En attente",
                'genre' => 'Masculin',
                'photo' => 'avatar.png',
                'user_id' => 1,
                'created_by' => 1,

            ],
            [
                'id' => 2,
                'uuid' => 'a00a5dcb-f3ae-407a-bf28-1aa08d892afc',
                'numb_cli' => '2022-2',
                'name' => 'Sawadogo',
                'lastname' => 'Zaki',
                'first_phone' => '70530101',
                'second_phone' => '73251446',
                'date_naiss' => Carbon::now()->subDays(200)->toDateTimeString(),
                'numb_cnib' => 'B855478',
                'montant_demande' => '200000',
                'status' => "Accepté",
                'genre' => 'Feminin',
                'photo' => 'avatar.png',
                'user_id' => 2,
                'created_by' => 1,

            ],
            ,
            [
                'id' => 3,
                'uuid' => 'a00a5dcb-f3ae-407a-bf28-1aa08d842afc',
                'numb_cli' => '2022-2',
                'name' => 'Tapsoba',
                'lastname' => 'Ali',
                'first_phone' => '70530101',
                'second_phone' => '73251446',
                'date_naiss' => Carbon::now()->subDays(200)->toDateTimeString(),
                'numb_cnib' => 'B85478',
                'montant_demande' => '200000',
                'status' => "Accepté",
                'genre' => 'Feminin',
                'photo' => 'avatar.png',
                'user_id' => 2,
                'created_by' => 1,

            ],
        ]);
    }
}
