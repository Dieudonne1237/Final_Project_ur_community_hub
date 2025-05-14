<?php

namespace App\Enums;

enum UserRole: string
{
    case UR_Community_Staff = 'UR_Community_Staff';
    case Community_Leader = 'Community_Leader';
    case User = 'User';

    public static function getValues(): array
    {
        return [self::UR_Community_Staff->value, self::Community_Leader->value, self::User->value];
    }
}
