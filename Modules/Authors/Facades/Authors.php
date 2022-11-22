<?php

namespace TypiCMS\Modules\Authors\Facades;

use Illuminate\Support\Facades\Facade;

class Authors extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'Authors';
    }
}
