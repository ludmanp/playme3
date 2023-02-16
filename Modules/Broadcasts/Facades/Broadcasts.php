<?php

namespace TypiCMS\Modules\Broadcasts\Facades;

use Illuminate\Support\Facades\Facade;

class Broadcasts extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'Broadcasts';
    }
}
