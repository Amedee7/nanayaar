<?php

namespace App\Http\Livewire;

use App\Models\Client;
use Livewire\Component;

class Calendar extends Component
{
    public $clients = [];
    public $idCalendar;

    public function render()
    {
        $this->clients = json_encode(Client::find($this->idCalendar)->clients()->get());
        return view('livewire.calendar');
    }
}
