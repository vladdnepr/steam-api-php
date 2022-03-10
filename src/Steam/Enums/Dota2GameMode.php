<?php

namespace SquegTech\Steam\Enums;

enum Dota2GameMode: int
{
    case NONE = 0;
    case ALL_PICK = 1;
    case CAPTAINS_MODE = 2;
    case RANDOM_DRAFT = 3;
    case SINGLE_DRAFT = 4;
    case ALL_RANDOM = 5;
    case INTRO = 6;
    case DIRETIDE = 7;
    case REVERSE_CAPTAINS_MODE = 8;
    case THE_GREEVILING = 9;
    case TUTORIAL = 10;
    case MID_ONLY = 11;
    case LEAST_PLAYED = 12;
    case NEW_PLAYER_POOL = 13;
    case COMPENDIUM_MATCHMAKING = 14;
    case CAPTAINS_DRAFT = 16;
}