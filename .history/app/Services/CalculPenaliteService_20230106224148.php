<?php

namespace App\Services;

use Carbon\Carbon;

class CalculPenaliteService
{
    /**
     * @Route("Route", name="RouteName")
     */

     
    function calculPenalite($reste_apaye, $nombre_de_jours) {
        $penalite = $reste_apaye * 1/100 * $nombre_de_jours;
        return $penalite;
    }
}
