<?php

namespace App\Services;


class NumberService{
//GENERATE RANDOM NUMBER CLIENT

/**
 * @Route("Route", name="RouteName")
 */
public function static generateNumber()
{
    $lastStudent = C::latest()->first();
        $lastStudent == null ?  $lastStudentID = 0 : $lastStudentID = $lastStudent->id;
        // if ($lastStudent == null) {
        //     $lastStudentID = 0;
        // } else {
        //     $lastStudentID = $lastStudent->id;
        // }
        $currentYear = Carbon::today()->format('Y');
        $matricule = $currentYear . '-' . $lastStudentID + 1;
    return $this->numb_cli;
}
}