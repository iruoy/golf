<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Golfer extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The flights that belong to the golfer.
     */
    public function flights(): BelongsToMany
    {
        return $this->belongsToMany(Flight::class)->using(FlightGolfer::class);
    }
}
