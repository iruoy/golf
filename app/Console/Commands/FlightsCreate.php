<?php

namespace App\Console\Commands;

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

        $golfers = Golfer::pluck('id')->toArray();

        $game->golfers()->attach($golfers);

        return 0;
    }
}
