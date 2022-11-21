<?php

namespace TypiCMS\Modules\Clients\Providers;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use TypiCMS\Modules\Core\Facades\TypiCMS;
use TypiCMS\Modules\Core\Observers\SlugObserver;
use TypiCMS\Modules\Clients\Composers\SidebarViewComposer;
use TypiCMS\Modules\Clients\Facades\Clients;
use TypiCMS\Modules\Clients\Models\Client;

class ModuleServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/clients.php', 'typicms.modules.clients');

        $this->loadViewsFrom(resource_path('views'), 'clients');

        AliasLoader::getInstance()->alias('Clients', Clients::class);

        View::composer('core::admin._sidebar', SidebarViewComposer::class);

        /*
         * Add the page in the view.
         */
        View::composer('clients::public.*', function ($view) {
            $view->page = TypiCMS::getPageLinkedToModule('clients');
        });
    }

    public function register(): void
    {
        $this->app->register(RouteServiceProvider::class);

        $this->app->bind('Clients', Client::class);
    }
}
