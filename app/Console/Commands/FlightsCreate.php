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

        $flights = [];

        foreach ($golfers as $i => $golfer) {
            if ($i < $min) {
                $flight = new Flight();
                $flight->game_id = $game->id;
                $flight->save();

                $flights[$i] = $flight;
            }

            $flights[$i % $min]->golfers()->attach($golfer->id);
        }

        foreach ($flights as $flight) {
            $count = $flight->golfers()->count();
            $lowest = 9999.0;
            $sum = 0.0;

            foreach ($flight->golfers as $golfer) {
                if ($lowest > $golfer->handicap) {
                    $lowest = $golfer->handicap;
                }

                $sum += $golfer->handicap;
            }

            $flight->average_handicap = $sum / $count;
            $flight->playing_handicap = $lowest / 2 + ($sum - $lowest) / ($count - 1) / 10;
            $flight->save();
        }

        return 0;
    }
}
