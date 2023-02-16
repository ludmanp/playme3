<?php

namespace TypiCMS\Modules\Video\Providers;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;
use TypiCMS\Modules\Video\Facades\Video;
use TypiCMS\Modules\Video\Services\VideoService;

class VideoServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        AliasLoader::getInstance()->alias('Video', Video::class);
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('Video', VideoService::class);
    }
}
