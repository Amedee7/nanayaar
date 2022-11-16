<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Event;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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
                'client_id' => 1,
                'rented' => false,
                'limit' => Carbon::now()->addDays(4)->toDateTimeString(),
                'start' =>  Carbon::now()->addDays(5)->toDateTimeString(),
                'end' =>  Carbon::now()->addDays(6)->toDateTimeString(),
            ],
            [
                'client_id' => 1,
                'rented' => true,
                'limit' => Carbon::now()->addDays(3)->toDateTimeString(),
                'start' =>  Carbon::now()->addDays(10)->toDateTimeString(),
                'end' =>  Carbon::now()->addDays(11)->toDateTimeString(),
            ],
            [
                'uuid' => 'a00a5dcb-f3ae-407a-bf28-1aa08d892afc',
                'client_id' => 1,
                'rented' => true,
                'limit' => Carbon::now()->addDays(9)->toDateTimeString(),
                'start' =>  Carbon::now()->addDays(16)->toDateTimeString(),
                'end' =>  Carbon::now()->addDays(18)->toDateTimeString(),
            ],
            [
                'client_id' => 2,
                'rented' => false,
                'limit' => Carbon::now()->addDays(4)->toDateTimeString(),
                'start' =>  Carbon::now()->addDays(5)->toDateTimeString(),
                'end' =>  Carbon::now()->addDays(6)->toDateTimeString(),
            ],
            [
                'client_id' => 2,
                'rented' => true,
                'limit' => Carbon::now()->addDays(4)->toDateTimeString(),
                'start' =>  Carbon::now()->addDays(11)->toDateTimeString(),
                'end' =>  Carbon::now()->addDays(15)->toDateTimeString(),
            ],
            [
                'client_id' => 2,
                'rented' => true,
                'limit' => Carbon::now()->addDays(9)->toDateTimeString(),
                'start' =>  Carbon::now()->addDays(16)->toDateTimeString(),
                'end' =>  Carbon::now()->addDays(17)->toDateTimeString(),
            ],
        ]);
    }
}
