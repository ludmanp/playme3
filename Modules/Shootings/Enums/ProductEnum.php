<?php

namespace TypiCMS\Modules\Shootings\Enums;

enum ProductEnum: string
{
    case STORIES = 'stories';
    case INTERVIEW = 'interview';
    case PROMO = 'promo';
    case MANUFACTURING = 'manufacturing';
    case EVENT = 'event';
    case DOCUMENTARY = 'documentary';
    case SHOW = 'show';
    case CLIP = 'clip';

    public static function forSelect(): array
    {
        $result = [];
        foreach (self::cases() as $case) {
            $result[] = ['key' => $case->value, 'title' => __(ucfirst($case->value))];
        }
        return $result;
    }
}
