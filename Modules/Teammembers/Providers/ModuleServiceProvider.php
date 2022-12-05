<?php

namespace TypiCMS\Modules\Teammembers\Providers;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use TypiCMS\Modules\Core\Facades\TypiCMS;
use TypiCMS\Modules\Core\Observers\SlugObserver;
use TypiCMS\Modules\Teammembers\Composers\SidebarViewComposer;
use TypiCMS\Modules\Teammembers\Facades\Teammembers;
use TypiCMS\Modules\Teammembers\Facades\TeammemberSocials;
use TypiCMS\Modules\Teammembers\Models\Teammember;
use TypiCMS\Modules\Teammembers\Models\TeammemberSocial;

class ModuleServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/teammembers.php', 'typicms.modules.teammembers');
        $this->mergeConfigFrom(__DIR__.'/../config/socials.php', 'typicms.modules.teammember_socials');

        $this->loadViewsFrom(resource_path('views'), 'teammembers');

        AliasLoader::getInstance()->alias('Teammembers', Teammembers::class);
        AliasLoader::getInstance()->alias('TeammemberSocials', TeammemberSocials::class);

        // Observers
        Teammember::observe(new SlugObserver());

        View::composer('core::admin._sidebar', SidebarViewComposer::class);

        /*
         * Add the page in the view.
         */
        View::composer('teammembers::public.*', function ($view) {
            $view->page = TypiCMS::getPageLinkedToModule('teammembers');
        });
    }

    public function register(): void
    {
        $this->app->register(RouteServiceProvider::class);

        $this->app->bind('Teammembers', Teammember::class);
        $this->app->bind('TeammemberSocials', TeammemberSocial::class);
    }
}
