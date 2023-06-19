<?php

namespace App\Enums;

use Illuminate\Support\Arr;

enum NewsStatus:string
{
    case HOT = "hot";
    case ACTIVE = "active";
    case WORKING = "working";
    case BLOKED = "bloked";

    public static function news_status_all(): array
    {
        return[
            self::HOT->value,
            self::ACTIVE->value,
            self::WORKING->value,
            self::BLOKED->value,
        ];
    }
}