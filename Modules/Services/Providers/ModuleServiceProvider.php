<?php

namespace TypiCMS\Modules\Services\Providers;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use TypiCMS\Modules\Core\Facades\TypiCMS;
use TypiCMS\Modules\Core\Observers\SlugObserver;
use TypiCMS\Modules\Services\Composers\SidebarViewComposer;
use TypiCMS\Modules\Services\Facades\Services;
use TypiCMS\Modules\Services\Facades\ServiceDetails;
use TypiCMS\Modules\Services\Models\Service;
use TypiCMS\Modules\Services\Models\ServiceDetail;

class ModuleServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/services.php', 'typicms.modules.services');
        $this->mergeConfigFrom(__DIR__.'/../config/config-details.php', 'typicms.service_details');

        $this->loadViewsFrom(resource_path('views'), 'services');

        $this->publishes([__DIR__.'/../database/migrations/create_services_table.php.stub' => getMigrationFileName('create_services_table')], 'typicms-migrations');

        AliasLoader::getInstance()->alias('Services', Services::class);
        AliasLoader::getInstance()->alias('ServiceDetails', ServiceDetails::class);

        // Observers
        Service::observe(new SlugObserver());
        ServiceDetail::observe(new SlugObserver());

        View::composer('core::admin._sidebar', SidebarViewComposer::class);

        /*
         * Add the page in the view.
         */
        View::composer('services::public.*', function ($view) {
            $view->page = TypiCMS::getPageLinkedToModule('services');
        });
        View::composer('services::public._nav', function ($view) {
            $view->services = Service::query()->published()->order()->get();
        });
    }

    public function register(): void
    {
        $this->app->register(RouteServiceProvider::class);

        $this->app->bind('Services', Service::class);
        $this->app->bind('ServiceDetails', ServiceDetail::class);
    }
}
