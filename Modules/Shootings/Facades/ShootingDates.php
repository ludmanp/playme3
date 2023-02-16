<?php

namespace TypiCMS\Modules\Shootings\Facades;

use Illuminate\Support\Facades\Facade;

class ShootingDates extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'ShootingDates';
    }
}
