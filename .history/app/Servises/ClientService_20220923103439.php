<?php

namespace App\Services;

use App\Models\Client;
use Carbon\Carbon;

class ClientService
{

    //GENERATE RANDOM NUMB CLIENT
    public static function generateNumbclient()
    {
        $lastClient = Client::latest()->first();
        $lastClient == null ?  $lastClientID = 0 : $lastClientID = $lastClient->id;
        // if ($lastStudent == null) {
        //     $lastClientID = 0;
        // } else {
        //     $lastClientID = $lastClient->id;
        // }
        // $currentMounth = Carbon::today()->format('M');
        $currentYear = Carbon::today()->format('Y');
        $numb_cli = $currentYear . '-' . $lastClientID + 1;

        return $numb_cli;
    }
}
