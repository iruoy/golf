<?php

namespace App\Console\Commands;

use App\Models\Flight;
use App\Models\Game;
use App\Models\Golfer;
use Illuminate\Console\Command;

class FlightsCreate extends Command
{
    protected $signature = 'flights:create';
    protected $description = 'Create Flights';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle(): int
    {
        $game = new Game();
        $game->name = 'test';
        $game->save();

        $golfers = Golfer::orderBy('handicap', 'DESC')->get();

        $min = ceil($golfers->count() / 4);

        $chunks = [];
        foreach ($golfers as $i => $golfer) {
            $chunks[$i % $min][] = $golfer->id;
        }

        foreach ($chunks as $chunk) {
            $flight = new Flight();
            $flight->game_id = $game->id;
            $flight->save();

            $flight->golfers()->sync($chunk);
        }

        return 0;
    }
}
