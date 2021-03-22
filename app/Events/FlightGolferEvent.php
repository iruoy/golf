<?php

namespace App\Events;

use App\Models\FlightGolfer;

class FlightGolferEvent
{
    public FlightGolfer $flightGolfer;

    public function __construct(FlightGolfer $flightGolfer)
    {
        $this->flightGolfer = $flightGolfer;
    }
}
