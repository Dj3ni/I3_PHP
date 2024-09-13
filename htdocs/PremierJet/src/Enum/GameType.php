<?php

namespace App\Enum;

enum GameType:string
{
    case COOP = "coop";
    case STRATEGY = "strat";
    case SOLO = "solo";
}