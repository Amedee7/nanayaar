<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use App\Models\Client;
use App\Models\Pret;
use Livewire\Component;

class Calendar extends Component
{
    public $prets = [];
    public $idCalendar;

    public function render()
    {
        $this->prets = json_encode(Client::find($this->idCalendar)->prets()->get());
        return view('livewire.calendar');
    }

    public function addEvent($event)
    {
        // Détermination date limite de paiement
        $start = Carbon::createFromFormat('Y-m-d', $event['end']);
        $diff = Carbon::now()->diffInDays($start);
        $event['limit'] = $start->addDays($diff < 8 ? 1 : 14)->toDateString();
        $event['user_id'] = auth()->id();
        $event['client_id'] = $this->idCalendar;
        Pret::create($event);
    }
}
