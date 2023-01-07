<?php

namespace App\Services;

use Carbon\Carbon;

class CalculPenaliteService
{
    /**
     * @Route("Route", name="RouteName")
     */

     $reste_apaye = 1000;
    $nombre_de_jours = 7;
    
    $penalite = calculPenalite($reste_apaye, $nombre_de_jours);
    echo "Le montant de la pénalité est de : " . $penalite . "€";
    function calculPenalite($reste_apaye, $nombre_de_jours) {
        $penalite = $reste_apaye * 1/100 * $nombre_de_jours;
        return $penalite;
    }
}
