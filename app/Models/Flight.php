<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Flight extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * Get the game that owns the flight.
     */
    public function game(): BelongsTo
    {
        return $this->belongsTo(Game::class);
    }

    /**
     * The golfers that belong to the flight.
     */
    public function golfers(): BelongsToMany
    {
        return $this->belongsToMany(Golfer::class)->using(FlightGolfer::class);
    }
}
