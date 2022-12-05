<?php

namespace TypiCMS\Modules\Blogcategories\Facades;

use Illuminate\Support\Facades\Facade;

class Blogcategories extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'Blogcategories';
    }
}
