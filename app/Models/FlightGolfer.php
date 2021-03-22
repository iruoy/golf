<?php

namespace App\Models;

use App\Events\FlightGolferEvent;
use Illuminate\Database\Eloquent\Relations\Pivot;

class FlightGolfer extends Pivot
{
    /**
     * The event map for the model.
     *
     * @var array
     */
    protected $dispatchesEvents = [
        'saved' => FlightGolferEvent::class,
        'deleted' => FlightGolferEvent::class,
    ];
}
