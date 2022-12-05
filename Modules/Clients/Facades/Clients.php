<?php

namespace TypiCMS\Modules\Clients\Facades;

use Illuminate\Support\Facades\Facade;

class Clients extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'Clients';
    }
}
