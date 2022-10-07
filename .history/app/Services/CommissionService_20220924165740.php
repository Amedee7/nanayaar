<?php

namespace App\Services;

use Carbon\Carbon;
use App\Models\Client;

class CommissionService
{
    //GENERATE RANDOM NUMBER CLIENT

    /**
     * @Route("Route", name="RouteName")
     */
    public static function generateCommission()
    {
        $lastMontant = Client::latest()->first();
        $montant = $montant->montant;


        $lastMontant = ($montant * 14) / 100;
        
        return $lastMontant;
    }
}
