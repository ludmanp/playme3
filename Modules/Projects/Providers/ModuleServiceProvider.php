<?php

namespace TypiCMS\Modules\Projects\Providers;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use TypiCMS\Modules\Core\Facades\TypiCMS;
use TypiCMS\Modules\Core\Observers\SlugObserver;
use TypiCMS\Modules\Projects\Composers\SidebarViewComposer;
use TypiCMS\Modules\Projects\Facades\Projects;
use TypiCMS\Modules\Projects\Facades\ProjectVideos;
use TypiCMS\Modules\Projects\Models\Project;
use TypiCMS\Modules\Projects\Models\ProjectVideo;
use TypiCMS\Modules\Video\Observers\VideoObserver;

class ModuleServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/projects.php', 'typicms.modules.projects');
        $this->mergeConfigFrom(__DIR__.'/../config/config-videos.php', 'typicms.modules.project_videos');

        $this->loadViewsFrom(resource_path('views'), 'projects');

        AliasLoader::getInstance()->alias('Projects', Projects::class);
        AliasLoader::getInstance()->alias('ProjectVideos', ProjectVideos::class);

        // Observers
        Project::observe(new SlugObserver());
        ProjectVideo::observe(new VideoObserver());

        View::composer('core::admin._sidebar', SidebarViewComposer::class);

        /*
         * Add the page in the view.
         */
        View::composer('projects::public.*', function ($view) {
            $view->page = TypiCMS::getPageLinkedToModule('projects');
        });
    }

    public function register(): void
    {
        $this->app->register(RouteServiceProvider::class);

        $this->app->bind('Projects', Project::class);
        $this->app->bind('ProjectVideos', ProjectVideo::class);
    }
}
