<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Calendar extends Component
{
    public $cl = [];
    public $idCalendar;

    public function render()
    {
        return view('livewire.calendar');
    }
}
