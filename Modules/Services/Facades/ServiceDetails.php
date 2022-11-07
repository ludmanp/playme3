<?php

namespace TypiCMS\Modules\Services\Facades;

use Illuminate\Support\Facades\Facade;

class ServiceDetails extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'ServiceDetails';
    }
}
