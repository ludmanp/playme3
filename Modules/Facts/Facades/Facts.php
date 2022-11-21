<?php

namespace TypiCMS\Modules\Facts\Facades;

use Illuminate\Support\Facades\Facade;

class Facts extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'Facts';
    }
}
