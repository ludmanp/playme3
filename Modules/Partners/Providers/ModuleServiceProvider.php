<?php

namespace TypiCMS\Modules\Partners\Providers;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use TypiCMS\Modules\Core\Facades\TypiCMS;
use TypiCMS\Modules\Core\Observers\SlugObserver;
use TypiCMS\Modules\Partners\Composers\SidebarViewComposer;
use TypiCMS\Modules\Partners\Facades\Partners;
use TypiCMS\Modules\Partners\Models\Partner;

class ModuleServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/partners.php', 'typicms.modules.partners');

        $this->loadViewsFrom(resource_path('views'), 'partners');

        AliasLoader::getInstance()->alias('Partners', Partners::class);


        View::composer('core::admin._sidebar', SidebarViewComposer::class);

        /*
         * Add the page in the view.
         */
        View::composer('partners::public.*', function ($view) {
            $view->page = TypiCMS::getPageLinkedToModule('partners');
        });
    }

    public function register(): void
    {
        $this->app->register(RouteServiceProvider::class);

        $this->app->bind('Partners', Partner::class);
    }
}
