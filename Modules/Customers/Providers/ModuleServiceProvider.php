<?php

namespace TypiCMS\Modules\Customers\Providers;

use Illuminate\Support\ServiceProvider;

class ModuleServiceProvider extends ServiceProvider
{
    public function register()
    {

    }

    public function boot()
    {
        $this->loadViewsFrom(resource_path('views'), 'customers');

        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
    }
}
