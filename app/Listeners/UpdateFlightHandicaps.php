<?php

namespace App\Listeners;

use App\Events\FlightGolferEvent;
use App\Models\Flight;

class UpdateFlightHandicaps
{
    public function handle(FlightGolferEvent $event)
    {
        $flight = Flight::find($event->flightGolfer->flight_id);

        $count = $flight->golfers()->count();

        if ($count > 1) {
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
    }
}
