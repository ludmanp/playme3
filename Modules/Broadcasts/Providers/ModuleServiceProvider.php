<?php

namespace TypiCMS\Modules\Broadcasts\Providers;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use TypiCMS\Modules\Core\Facades\TypiCMS;
use TypiCMS\Modules\Core\Observers\SlugObserver;
use TypiCMS\Modules\Broadcasts\Composers\SidebarViewComposer;
use TypiCMS\Modules\Broadcasts\Facades\Broadcasts;
use TypiCMS\Modules\Broadcasts\Facades\BroadcastDates;
use TypiCMS\Modules\Broadcasts\Facades\BroadcastAddresses;
use TypiCMS\Modules\Broadcasts\Models\Broadcast;
use TypiCMS\Modules\Broadcasts\Models\BroadcastDate;
use TypiCMS\Modules\Broadcasts\Models\BroadcastAddress;

class ModuleServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/broadcasts.php', 'typicms.modules.broadcasts');
        $this->mergeConfigFrom(__DIR__.'/../config/addresses.php', 'typicms.broadcast_addresses');
        $this->mergeConfigFrom(__DIR__.'/../config/dates.php', 'typicms.broadcast_dates');

        $this->loadViewsFrom(resource_path('views'), 'broadcasts');

        AliasLoader::getInstance()->alias('Broadcasts', Broadcasts::class);
        AliasLoader::getInstance()->alias('BroadcastDates', BroadcastDates::class);
        AliasLoader::getInstance()->alias('BroadcastAddresses', BroadcastAddresses::class);

        View::composer('core::admin._sidebar', SidebarViewComposer::class);
        /*
         * Add the page in the view.
         */
        View::composer('broadcasts::public.*', function ($view) {
            $view->page = TypiCMS::getPageLinkedToModule('broadcasts');
        });
    }

    public function register(): void
    {
        $this->app->register(RouteServiceProvider::class);

        $this->app->bind('Broadcasts', Broadcast::class);
        $this->app->bind('BroadcastDates', BroadcastDate::class);
        $this->app->bind('BroadcastAddresses', BroadcastAddress::class);
    }
}
