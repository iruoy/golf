<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Game extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * Get the flights for the blog game.
     */
    public function flights(): HasMany
    {
        return $this->hasMany(Flight::class);
    }

    /**
     * The golfers that belong to the game.
     */
    public function golfers(): BelongsToMany
    {
        return $this->belongsToMany(Golfer::class)->using(GameGolfer::class);
    }
}
