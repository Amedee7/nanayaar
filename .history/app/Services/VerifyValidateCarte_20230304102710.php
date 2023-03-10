<?php

namespace App\Services;

use DateTime;

class VerifyV
{
    public function validateCardExpiration($attribute, $value)
    {
        $expirationDate = DateTime::createFromFormat('Y-m-d', $value);
        $currentDate = new DateTime();
        $interval = $expirationDate->diff($currentDate);
        $years = $interval->y;

        return $years >= 5;
    }
}
