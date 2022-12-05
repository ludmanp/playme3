<?php

namespace TypiCMS\Modules\Articles\Facades;

use Illuminate\Support\Facades\Facade;

class Articles extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'Articles';
    }
}
