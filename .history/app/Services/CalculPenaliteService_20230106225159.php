<?php

namespace App\Services;

use Carbon\Carbon;

class CalculPenaliteService
{
    /**
     * @Route("Route", name="RouteName")
     */
    function calculPenalite($reste_apaye, $date_limite) {
        $now = Carbon::now();
        $nombre_de_jours = $now->diffInDays($date_limite);
        $penalite = $reste_apaye * 1/100 * $nombre_de_jours;
        return $penalite;
    }
    
    
}
