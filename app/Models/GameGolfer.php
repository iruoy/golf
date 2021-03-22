<?php

namespace App\Models;

use App\Events\GameGolferEvent;
use Illuminate\Database\Eloquent\Relations\Pivot;

class GameGolfer extends Pivot
{
    /**
     * The event map for the model.
     *
     * @var array
     */
    protected $dispatchesEvents = [
        'saved' => GameGolferEvent::class,
        'deleted' => GameGolferEvent::class,
    ];
}
