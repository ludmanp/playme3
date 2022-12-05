<?php

namespace TypiCMS\Modules\Pageoptions\Providers;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;
use TypiCMS\Modules\Core\Models\Page;
use TypiCMS\Modules\Pageoptions\Composers\NameForInputComposer;
use TypiCMS\Modules\Pageoptions\Composers\PageTemplateOptionsComposer;
use TypiCMS\Modules\Pageoptions\Composers\PublicPageOptionsComposer;
use TypiCMS\Modules\Pageoptions\Facades\Pageoptions;
use TypiCMS\Modules\Pageoptions\Models\Pageoption;
use TypiCMS\Modules\Pageoptions\Observers\PageoptionsArrayObserver;
use TypiCMS\Modules\Pageoptions\Observers\PageOptionsObserver;

class ModuleProvider extends ServiceProvider
{
    public function boot()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'typicms.pageoptions');

        $modules = $this->app['config']['typicms']['modules'];
        $this->app['config']->set('typicms.modules', array_merge(['pageoptions' => ['']], $modules));

        $this->loadViewsFrom(resource_path('views'), 'pageoptions');
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        // Observers
        Page::observe(new PageOptionsObserver());
        Pageoption::observe(new PageoptionsArrayObserver());

        AliasLoader::getInstance()->alias('Pageoptions', Pageoptions::class);

        $this->app->view->composer('pageoptions::admin.*', PageTemplateOptionsComposer::class);
        $this->app->view->composer('pageoptions::admin.elements.*', NameForInputComposer::class);
        $this->app->view->composer('pages::public.*', PublicPageOptionsComposer::class);
}

    public function register()
    {
        $app = $this->app;

        $app->bind('Pageoptions', Pageoption::class);
    }
}
