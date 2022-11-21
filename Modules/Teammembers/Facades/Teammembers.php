<?php

namespace TypiCMS\Modules\Teammembers\Facades;

use Illuminate\Support\Facades\Facade;

class Teammembers extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'Teammembers';
    }
}
