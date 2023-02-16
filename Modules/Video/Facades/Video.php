<?php

namespace TypiCMS\Modules\Video\Facades;


use Illuminate\Support\Facades\Facade;

/**
 * Class Video
 * @package App\Facades
 *
 * @method static getThumb($link): string
 */
class Video extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return 'Video'; }

}
