<?php

namespace TypiCMS\Modules\Pageoptions\Facades;

use Illuminate\Support\Facades\Facade;

class Pageoptions extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'Pageoptions';
    }
}
