<?php

namespace TypiCMS\Modules\Broadcasts\Facades;

use Illuminate\Support\Facades\Facade;

class BroadcastDates extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'BroadcastDates';
    }
}
