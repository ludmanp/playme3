<?php

namespace TypiCMS\Modules\Blogcategories\Providers;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use TypiCMS\Modules\Core\Facades\TypiCMS;
use TypiCMS\Modules\Core\Observers\SlugObserver;
use TypiCMS\Modules\Blogcategories\Composers\SidebarViewComposer;
use TypiCMS\Modules\Blogcategories\Facades\Blogcategories;
use TypiCMS\Modules\Blogcategories\Models\Blogcategory;

class ModuleServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/blogcategories.php', 'typicms.modules.blogcategories');

        $this->loadViewsFrom(resource_path('views'), 'blogcategories');

        AliasLoader::getInstance()->alias('Blogcategories', Blogcategories::class);

        // Observers
        Blogcategory::observe(new SlugObserver());

        View::composer('core::admin._sidebar', SidebarViewComposer::class);

        /*
         * Add the page in the view.
         */
        View::composer('blogcategories::public.*', function ($view) {
            $view->page = TypiCMS::getPageLinkedToModule('blogcategories');
        });
    }

    public function register(): void
    {
        $this->app->register(RouteServiceProvider::class);

        $this->app->bind('Blogcategories', Blogcategory::class);
    }
}
