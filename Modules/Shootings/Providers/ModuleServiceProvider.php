<?php

namespace TypiCMS\Modules\Shootings\Providers;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use TypiCMS\Modules\Shootings\Facades\ShootingAddresses;
use TypiCMS\Modules\Shootings\Facades\ShootingDates;
use TypiCMS\Modules\Shootings\Models\ShootingDate;
use TypiCMS\Modules\Core\Facades\TypiCMS;
use TypiCMS\Modules\Shootings\Composers\SidebarViewComposer;
use TypiCMS\Modules\Shootings\Facades\Shootings;
use TypiCMS\Modules\Shootings\Models\Shooting;
use TypiCMS\Modules\Shootings\Models\ShootingAddress;

class ModuleServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/shootings.php', 'typicms.modules.shootings');
        $this->mergeConfigFrom(__DIR__.'/../config/addresses.php', 'typicms.shooting_addresses');
        $this->mergeConfigFrom(__DIR__.'/../config/dates.php', 'typicms.shooting_dates');

        $this->loadViewsFrom(resource_path('views'), 'shootings');

        AliasLoader::getInstance()->alias('Shootings', Shootings::class);
        AliasLoader::getInstance()->alias('ShootingDates', ShootingDates::class);
        AliasLoader::getInstance()->alias('ShootingAddresses', ShootingAddresses::class);

        View::composer('core::admin._sidebar', SidebarViewComposer::class);

        /*
         * Add the page in the view.
         */
        View::composer('shootings::public.*', function ($view) {
            $view->page = TypiCMS::getPageLinkedToModule('shootings');
        });
    }

    public function register(): void
    {
        $this->app->register(RouteServiceProvider::class);

        $this->app->bind('Shootings', Shooting::class);
        $this->app->bind('ShootingDates', ShootingDate::class);
        $this->app->bind('ShootingAddresses', ShootingAddress::class);
    }
}
