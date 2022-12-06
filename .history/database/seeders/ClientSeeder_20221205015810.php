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
                'lastname' => 'Cheik',
                'first_phone' => '70530101',
                'second_phone' => '73251446',
                'date_naiss' => Carbon::now()->subDays(100)->toDateTimeString(),
                'numb_cnib' => 'B365478',
                'montant_demande' => '100000',
                'commission_averse' => 100000 * 14 / 100,
                'status' => "Attente",
                'genre' => 'Masculin',
                'adresse' => 'Gounghin, Ouagadougou, BF',
                'photo' => 'avatar.png',
                'user_id' => 1,
                'created_by' => 1,
                        $s->created_at = date('Y-m-d h:i:s'


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
                'commission_averse' => 200000 * 14 / 100,
                'status' => "Accepté",
                'genre' => 'Feminin',
                'adresse' => 'Gounghin, Ouagadougou, BF',
                'photo' => 'avatar.png',
                'user_id' => 2,
                'created_by' => 1,
                        $s->created_at = date('Y-m-d h:i:s'


            ],
            [
                'id' => 3,
                'uuid' => 'a00a5dcb-f3ae-407a-bf28-1aa08d842afc',
                'numb_cli' => '2022-3',
                'name' => 'Tapsoba',
                'lastname' => 'Ali',
                'first_phone' => '70530101',
                'second_phone' => '73251446',
                'date_naiss' => Carbon::now()->subDays(200)->toDateTimeString(),
                'numb_cnib' => 'B835478',
                'montant_demande' => '175000',
                'commission_averse' => 175000 * 14 / 100,
                'status' => "Rejeté",
                'genre' => 'Masculin',
                'adresse' => 'Tanghin, Ouagadougou, BF',
                'photo' => 'avatar.png',
                'user_id' => 1,
                'created_by' => 1,
                        $s->created_at = date('Y-m-d h:i:s'


            ],
            [
                'id' => 4,
                'uuid' => 'a00a8dcb-f3ae-407a-bf28-1aa08d842afc',
                'numb_cli' => '2022-4',
                'name' => 'Dicko',
                'lastname' => 'Amidou',
                'first_phone' => '70570101',
                'second_phone' => '73951446',
                'date_naiss' => Carbon::now()->subDays(200)->toDateTimeString(),
                'numb_cnib' => 'B105478',
                'montant_demande' => '100000',
                'commission_averse' => 100000 * 14 / 100,
                'status' => "Accepté",
                'genre' => 'Masculin',
                'adresse' => 'Kamboince, Ouagadougou, BF',
                'photo' => 'avatar.png',
                'user_id' => 1,
                'created_by' => 2,
                        $s->created_at = date('Y-m-d h:i:s'


            ],
        ]);
    }
}
