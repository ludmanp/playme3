<?php

namespace TypiCMS\Modules\Contactforms\Facades;

use Illuminate\Support\Facades\Facade;

class Contactforms extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'Contactforms';
    }
}
