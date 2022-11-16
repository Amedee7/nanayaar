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
        $lastCLientID = 0;
        $montant_demande = Client::select('montant_demande');
        $montant_demandeM = $montant_demande->montant_demande;

        $commission_verse = $montant_demandeM * 14 / 100;
        return $commission_verse;
        // App\Services\CommissionAVerse::CommissionVerse()
    }
}
