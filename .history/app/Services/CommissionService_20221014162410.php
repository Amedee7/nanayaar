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
        public function date()
        {
            // Détermination date limite de paiement
            $start = Carbon::createFromFormat('Y-m-d', $event['end']);
            $diff = Carbon::now()->diffInDays($start);
            $event['limit'] = $start->addDays($diff < 8 ? 1 : 14)->toDateString();
            $event['user_id'] = auth()->id();
            $event['home_id'] = $this->idCalendar;
            Event::create($event);
        }
    }
}
