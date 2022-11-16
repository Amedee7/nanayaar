<?php

namespace App\Services;

use Carbon\Carbon;

class CommissionAVerse
{
    //GENERATE RANDOM NUMBER CLIENT

    /**
     * @Route("Route", name="RouteName")
     */
    public static function CommissionVerse()
    {
        // get the current time
        $montant_demande = Carbon::now();
        // add 30 days to the current time
        $commission_verse = $montant_demande * 14) / 100;
        return $commission_verse;
    }
}
