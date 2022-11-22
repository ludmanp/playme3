<?php

namespace TypiCMS\Modules\Articles\Providers;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use TypiCMS\Modules\Core\Facades\TypiCMS;
use TypiCMS\Modules\Core\Observers\SlugObserver;
use TypiCMS\Modules\Articles\Composers\SidebarViewComposer;
use TypiCMS\Modules\Articles\Facades\Articles;
use TypiCMS\Modules\Articles\Models\Article;

class ModuleServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/articles.php', 'typicms.modules.articles');

        $this->loadViewsFrom(resource_path('views'), 'articles');

        AliasLoader::getInstance()->alias('Articles', Articles::class);

        // Observers
        Article::observe(new SlugObserver());

        View::composer('core::admin._sidebar', SidebarViewComposer::class);

        /*
         * Add the page in the view.
         */
        View::composer('articles::public.*', function ($view) {
            $view->page = TypiCMS::getPageLinkedToModule('articles');
        });
    }

    public function register(): void
    {
        $this->app->register(RouteServiceProvider::class);

        $this->app->bind('Articles', Article::class);
    }
}
