<?php

namespace App\Services;

use App\Models\Client;

class CommissionAVerse
{
    //GENERATE RANDOM NUMBER CLIENT

    /**
     * @Route("Route", name="RouteName")
     */
    public static function CommissionVerse()
    {
        $montant_demande = Client::latest()->first();

        $commission_verse = $montant_demande * 14 / 100;
        return $commission_verse;
    }
}
