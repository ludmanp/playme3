<?php

namespace TypiCMS\Modules\Clients\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use TypiCMS\Modules\Core\Facades\TypiCMS;
use TypiCMS\Modules\Clients\Http\Controllers\AdminController;
use TypiCMS\Modules\Clients\Http\Controllers\ApiController;
use TypiCMS\Modules\Clients\Http\Controllers\PublicController;

class RouteServiceProvider extends ServiceProvider
{
    public function map(): void
    {
        /*
         * Front office routes
         */
        if ($page = TypiCMS::getPageLinkedToModule('clients')) {
            $middleware = $page->private ? ['public', 'auth'] : ['public'];
            foreach (locales() as $lang) {
                if ($page->isPublished($lang) && $uri = $page->uri($lang)) {
                    Route::middleware($middleware)->prefix($uri)->name($lang.'::')->group(function (Router $router) {
                        $router->get('/', [PublicController::class, 'index'])->name('index-clients');
                        $router->get('{slug}', [PublicController::class, 'show'])->name('client');
                    });
                }
            }
        }

        /*
         * Admin routes
         */
        Route::middleware('admin')->prefix('admin')->name('admin::')->group(function (Router $router) {
            $router->get('clients', [AdminController::class, 'index'])->name('index-clients')->middleware('can:read clients');
            $router->get('clients/export', [AdminController::class, 'export'])->name('export-clients')->middleware('can:read clients');
            $router->get('clients/create', [AdminController::class, 'create'])->name('create-client')->middleware('can:create clients');
            $router->get('clients/{client}/edit', [AdminController::class, 'edit'])->name('edit-client')->middleware('can:read clients');
            $router->post('clients', [AdminController::class, 'store'])->name('store-client')->middleware('can:create clients');
            $router->put('clients/{client}', [AdminController::class, 'update'])->name('update-client')->middleware('can:update clients');
        });

        /*
         * API routes
         */
        Route::middleware(['api', 'auth:api'])->prefix('api')->group(function (Router $router) {
            $router->get('clients', [ApiController::class, 'index'])->middleware('can:read clients');
            $router->patch('clients/{client}', [ApiController::class, 'updatePartial'])->middleware('can:update clients');
            $router->delete('clients/{client}', [ApiController::class, 'destroy'])->middleware('can:delete clients');
        });
    }
}
