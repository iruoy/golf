<?php

namespace App\Events;

use App\Models\GameGolfer;

class GameGolferEvent
{
    public GameGolfer $gameGolfer;

    public function __construct(GameGolfer $gameGolfer)
    {
        $this->gameGolfer = $gameGolfer;
    }
}
