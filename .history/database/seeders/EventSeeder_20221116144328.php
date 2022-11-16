<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Event;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Event::insert([
            [
                'uuid' => 'a00a5dcb-f3ae-407a-bf28-1aa08d892afc',
                'client_id' => 1,
                'rented' => false,
                'limit' => Carbon::now()->addDays(4)->toDateTimeString(),
                'start' =>  Carbon::now()->addDays(5)->toDateTimeString(),
                'end' =>  Carbon::now()->addDays(6)->toDateTimeString(),
                'created_by' => 1,

            ],
            [
                'uuid' => 'a00a3dcb-f3ae-407a-bf28-1aa08d892afc',
                'client_id' => 1,
                'rented' => true,
                'limit' => Carbon::now()->addDays(3)->toDateTimeString(),
                'start' =>  Carbon::now()->addDays(10)->toDateTimeString(),
                'end' =>  Carbon::now()->addDays(11)->toDateTimeString(),
                'created_by' => 1,

            ],
            [
                'uuid' => 'a00a5dcb-f3ae-407a-bf28-1aa084892afc',
                'client_id' => 1,
                'rented' => true,
                'limit' => Carbon::now()->addDays(9)->toDateTimeString(),
                'start' =>  Carbon::now()->addDays(16)->toDateTimeString(),
                'end' =>  Carbon::now()->addDays(18)->toDateTimeString(),
                'created_by' => 1,

            ],
            [
                'uuid' => 'a00a5dcb-f3ae-407a-bf28-1aa58d892afc',
                'client_id' => 2,
                'rented' => false,
                'limit' => Carbon::now()->addDays(4)->toDateTimeString(),
                'start' =>  Carbon::now()->addDays(5)->toDateTimeString(),
                'end' =>  Carbon::now()->addDays(6)->toDateTimeString(),
                'created_by' => 1,

            ],
            [
                'uuid' => 'a00a5dcb-f3ae-487a-bf28-1aa08d892afc',
                'client_id' => 2,
                'rented' => true,
                'limit' => Carbon::now()->addDays(4)->toDateTimeString(),
                'start' =>  Carbon::now()->addDays(11)->toDateTimeString(),
                'end' =>  Carbon::now()->addDays(15)->toDateTimeString(),
                'created_by' => 1,

            ],
            [
                'uuid' => 'a00a5dcb-f3ae-407a-bf28-1ag08d892afc',
                'client_id' => 2,
                'rented' => true,
                'limit' => Carbon::now()->addDays(9)->toDateTimeString(),
                'start' =>  Carbon::now()->addDays(16)->toDateTimeString(),
                'end' =>  Carbon::now()->addDays(17)->toDateTimeString(),
                'created_by' => 1,

            ],
        ]);
    }
}
