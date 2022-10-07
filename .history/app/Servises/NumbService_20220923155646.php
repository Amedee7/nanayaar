<?php

namespace App\Services;

use App\Models\Client;
use Carbon\Carbon;

class NumbService
{
    //GENERATE RANDOM NUMB CLIENT
    public static function generateNumb()
    {
        $lastClient = Client::latest()->first();
        $lastClient == null ?  $lastClientID = 0 : $lastClientID = $lastClient->id;

        $currentYear = Carbon::today()->format('Y');
        $numb_cli = $currentYear . '-' . $lastClientID + 1;

        return $numb_cli;
    }
}
