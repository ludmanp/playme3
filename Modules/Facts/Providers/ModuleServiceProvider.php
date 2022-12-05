<?php

namespace TypiCMS\Modules\Facts\Providers;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use TypiCMS\Modules\Core\Facades\TypiCMS;
use TypiCMS\Modules\Core\Observers\SlugObserver;
use TypiCMS\Modules\Facts\Composers\SidebarViewComposer;
use TypiCMS\Modules\Facts\Facades\Facts;
use TypiCMS\Modules\Facts\Models\Fact;

class ModuleServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/facts.php', 'typicms.modules.facts');

        $this->loadViewsFrom(resource_path('views'), 'facts');

        AliasLoader::getInstance()->alias('Facts', Facts::class);

        View::composer('core::admin._sidebar', SidebarViewComposer::class);

        /*
         * Add the page in the view.
         */
        View::composer('facts::public.*', function ($view) {
            $view->page = TypiCMS::getPageLinkedToModule('facts');
        });
    }

    public function register(): void
    {
        $this->app->register(RouteServiceProvider::class);

        $this->app->bind('Facts', Fact::class);
    }
}
