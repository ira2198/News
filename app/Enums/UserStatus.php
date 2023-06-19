<?php

namespace App\Enums;

use Illuminate\Support\Arr;

enum UserStatus:string
{
    case ACTIVE = "active";
    case ADMIN = "admin";
    case REMOTE = "remote";

    public static function user_status_all(): array
    {
        return[
            self::ACTIVE->value,
            self::ADMIN->value,
            self::REMOTE->value,
        ];
    }
}