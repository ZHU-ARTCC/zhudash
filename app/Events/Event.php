<?php

namespace App\Events;

abstract class Event
    
{
    public function index()
    {
        return view('events');
    }
}
