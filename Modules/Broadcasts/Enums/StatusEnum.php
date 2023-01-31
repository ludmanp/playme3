<?php

namespace TypiCMS\Modules\Broadcasts\Enums;

enum StatusEnum:string
{
    case NEW = 'new';
    case APPROVED = 'approved';
    case DECLINED = 'declined';

    public static function forSelect(): array
    {
        $result = [];
        foreach (self::cases() as $case) {
            $result[$case->value] = __(ucfirst($case->value));
        }
        return $result;
    }
}
