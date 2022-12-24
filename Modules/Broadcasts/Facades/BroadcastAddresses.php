<?php

namespace TypiCMS\Modules\Broadcasts\Facades;

use Illuminate\Support\Facades\Facade;

class BroadcastAddresses extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'BroadcastAddresses';
    }
}
