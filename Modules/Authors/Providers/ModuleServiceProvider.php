<?php

namespace TypiCMS\Modules\Authors\Providers;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use TypiCMS\Modules\Core\Facades\TypiCMS;
use TypiCMS\Modules\Core\Observers\SlugObserver;
use TypiCMS\Modules\Authors\Composers\SidebarViewComposer;
use TypiCMS\Modules\Authors\Facades\Authors;
use TypiCMS\Modules\Authors\Models\Author;

class ModuleServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/authors.php', 'typicms.modules.authors');

        $this->loadViewsFrom(resource_path('views'), 'authors');

        AliasLoader::getInstance()->alias('Authors', Authors::class);

        // Observers
        Author::observe(new SlugObserver());

        View::composer('core::admin._sidebar', SidebarViewComposer::class);

        /*
         * Add the page in the view.
         */
        View::composer('authors::public.*', function ($view) {
            $view->page = TypiCMS::getPageLinkedToModule('authors');
        });
    }

    public function register(): void
    {
        $this->app->register(RouteServiceProvider::class);

        $this->app->bind('Authors', Author::class);
    }
}
