<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Calendar extends Component
{
    public $clients = [];
    public $idCalendar;

    public function render()
    {
        $this->clients = json_encode(C::find($this->idCalendar)->events()->get());
        return view('livewire.calendar');
    }
}
