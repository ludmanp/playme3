<?php

namespace TypiCMS\Modules\Articles\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use TypiCMS\Modules\Core\Facades\TypiCMS;
use TypiCMS\Modules\Articles\Http\Controllers\AdminController;
use TypiCMS\Modules\Articles\Http\Controllers\ApiController;
use TypiCMS\Modules\Articles\Http\Controllers\PublicController;

class RouteServiceProvider extends ServiceProvider
{
    public function map(): void
    {
        /*
         * Front office routes
         */
        if ($page = TypiCMS::getPageLinkedToModule('articles')) {
            $middleware = $page->private ? ['public', 'auth'] : ['public'];
            foreach (locales() as $lang) {
                if ($page->isPublished($lang) && $uri = $page->uri($lang)) {
                    Route::middleware($middleware)->prefix($uri)->name($lang.'::')->group(function (Router $router) {
                        $router->get('/', [PublicController::class, 'index'])->name('index-articles');
                        $router->get('{slug}', [PublicController::class, 'show'])->name('article');
                    });
                }
            }
        }

        /*
         * Admin routes
         */
        Route::middleware('admin')->prefix('admin')->name('admin::')->group(function (Router $router) {
            $router->get('articles', [AdminController::class, 'index'])->name('index-articles')->middleware('can:read articles');
            $router->get('articles/export', [AdminController::class, 'export'])->name('export-articles')->middleware('can:read articles');
            $router->get('articles/create', [AdminController::class, 'create'])->name('create-article')->middleware('can:create articles');
            $router->get('articles/{article}/edit', [AdminController::class, 'edit'])->name('edit-article')->middleware('can:read articles');
            $router->post('articles', [AdminController::class, 'store'])->name('store-article')->middleware('can:create articles');
            $router->put('articles/{article}', [AdminController::class, 'update'])->name('update-article')->middleware('can:update articles');
        });

        /*
         * API routes
         */
        Route::middleware(['api', 'auth:api'])->prefix('api')->group(function (Router $router) {
            $router->get('articles', [ApiController::class, 'index'])->middleware('can:read articles');
            $router->patch('articles/{article}', [ApiController::class, 'updatePartial'])->middleware('can:update articles');
            $router->delete('articles/{article}', [ApiController::class, 'destroy'])->middleware('can:delete articles');
        });
    }
}
