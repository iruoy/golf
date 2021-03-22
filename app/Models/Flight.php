<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Flight extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The golfers that belong to the flight.
     */
    public function golfers(): BelongsToMany
    {
        return $this->belongsToMany(Golfer::class);
    }
}
