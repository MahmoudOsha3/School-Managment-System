<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\EventCalender ;

class CalenderStudent extends Component
{
    public $events = '';

    public function getevent()
    {
        $events = EventCalender::select('id','title','start')->get();
        return  json_encode($events);
    }

    public function render()
    {
        $events = EventCalender::select('id','title','start')->get();
        $this->events = json_encode($events);
        return view('livewire.calender-student');
    }
}
