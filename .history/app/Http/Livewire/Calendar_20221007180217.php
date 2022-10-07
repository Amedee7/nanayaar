<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Calendar extends Component
{
    public $clients = [];
    public $idCalendar;

    public function render()
    {
        return view('livewire.calendar');
    }
}
