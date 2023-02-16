<?php

namespace TypiCMS\Modules\Contactforms\Providers;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use TypiCMS\Modules\Core\Facades\TypiCMS;
use TypiCMS\Modules\Core\Observers\SlugObserver;
use TypiCMS\Modules\Contactforms\Composers\SidebarViewComposer;
use TypiCMS\Modules\Contactforms\Facades\Contactforms;
use TypiCMS\Modules\Contactforms\Models\Contactform;

class ModuleServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/contactforms.php', 'typicms.modules.contactforms');

        $this->loadViewsFrom(resource_path('views'), 'contactforms');

        AliasLoader::getInstance()->alias('Contactforms', Contactforms::class);

        View::composer('core::admin._sidebar', SidebarViewComposer::class);

        /*
         * Add the page in the view.
         */
        View::composer('contactforms::public.*', function ($view) {
            $view->page = TypiCMS::getPageLinkedToModule('contactforms');
        });
    }

    public function register(): void
    {
        $this->app->register(RouteServiceProvider::class);

        $this->app->bind('Contactforms', Contactform::class);
    }
}
