<?php

namespace App\Listeners;

use App\Events\GameGolferEvent;
use App\Models\Flight;
use App\Models\Game;
use App\Models\Golfer;

class UpdateFlights
{
    public function handle(GameGolferEvent $event)
    {
        $game = Game::find($event->gameGolfer->game_id);

        Flight::where('game_id', $game->id)->delete();

        $golfers = $game->golfers->sortByDesc('handicap');

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
    }
}
