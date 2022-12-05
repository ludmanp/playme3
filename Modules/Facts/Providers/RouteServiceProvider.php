<?php

namespace TypiCMS\Modules\Facts\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use TypiCMS\Modules\Core\Facades\TypiCMS;
use TypiCMS\Modules\Facts\Http\Controllers\AdminController;
use TypiCMS\Modules\Facts\Http\Controllers\ApiController;
use TypiCMS\Modules\Facts\Http\Controllers\PublicController;

class RouteServiceProvider extends ServiceProvider
{
    public function map(): void
    {
        /*
         * Front office routes
         */
        if ($page = TypiCMS::getPageLinkedToModule('facts')) {
            $middleware = $page->private ? ['public', 'auth'] : ['public'];
            foreach (locales() as $lang) {
                if ($page->isPublished($lang) && $uri = $page->uri($lang)) {
                    Route::middleware($middleware)->prefix($uri)->name($lang.'::')->group(function (Router $router) {
                        $router->get('/', [PublicController::class, 'index'])->name('index-facts');
                        $router->get('{slug}', [PublicController::class, 'show'])->name('fact');
                    });
                }
            }
        }

        /*
         * Admin routes
         */
        Route::middleware('admin')->prefix('admin')->name('admin::')->group(function (Router $router) {
            $router->get('facts', [AdminController::class, 'index'])->name('index-facts')->middleware('can:read facts');
            $router->get('facts/export', [AdminController::class, 'export'])->name('export-facts')->middleware('can:read facts');
            $router->get('facts/create', [AdminController::class, 'create'])->name('create-fact')->middleware('can:create facts');
            $router->get('facts/{fact}/edit', [AdminController::class, 'edit'])->name('edit-fact')->middleware('can:read facts');
            $router->post('facts', [AdminController::class, 'store'])->name('store-fact')->middleware('can:create facts');
            $router->put('facts/{fact}', [AdminController::class, 'update'])->name('update-fact')->middleware('can:update facts');
        });

        /*
         * API routes
         */
        Route::middleware(['api', 'auth:api'])->prefix('api')->group(function (Router $router) {
            $router->get('facts', [ApiController::class, 'index'])->middleware('can:read facts');
            $router->patch('facts/{fact}', [ApiController::class, 'updatePartial'])->middleware('can:update facts');
            $router->delete('facts/{fact}', [ApiController::class, 'destroy'])->middleware('can:delete facts');
        });
    }
}
