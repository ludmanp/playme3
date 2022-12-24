<?php

namespace TypiCMS\Modules\Broadcasts\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use TypiCMS\Modules\Core\Facades\TypiCMS;
use TypiCMS\Modules\Broadcasts\Http\Controllers\AdminController;
use TypiCMS\Modules\Broadcasts\Http\Controllers\ApiController;
use TypiCMS\Modules\Broadcasts\Http\Controllers\PublicController;
use TypiCMS\Modules\Broadcasts\Http\Controllers\DatesAdminController;
use TypiCMS\Modules\Broadcasts\Http\Controllers\DatesApiController;
use TypiCMS\Modules\Broadcasts\Http\Controllers\DatesPublicController;
use TypiCMS\Modules\Broadcasts\Http\Controllers\AddressesAdminController;
use TypiCMS\Modules\Broadcasts\Http\Controllers\AddressesApiController;
use TypiCMS\Modules\Broadcasts\Http\Controllers\AddressesPublicController;

class RouteServiceProvider extends ServiceProvider
{
    public function map(): void
    {
        /*
         * Front office routes
         */
        if ($page = TypiCMS::getPageLinkedToModule('broadcasts')) {
            $middleware = $page->private ? ['public', 'auth'] : ['public'];
            foreach (locales() as $lang) {
                if ($page->isPublished($lang) && $uri = $page->uri($lang)) {
                    Route::middleware($middleware)->prefix($uri)->name($lang.'::')->group(function (Router $router) {
                        $router->get('/', [PublicController::class, 'index'])->name('index-broadcasts');
                        $router->get('{slug}', [PublicController::class, 'show'])->name('broadcast');
                    });
                }
            }
        }
        foreach (locales() as $lang) {
            Route::middleware(['public', 'auth'])->prefix($lang . '/broadcast')->name($lang.'::')->group(function (Router $router) {
                $router->get('create', [PublicController::class, 'create'])->name('create-broadcast');
                $router->post('create', [PublicController::class, 'store'])->name('store-broadcast');
            });
        }

        /*
         * Admin routes
         */
        Route::middleware('admin')->prefix('admin')->name('admin::')->group(function (Router $router) {
            $router->get('broadcasts', [AdminController::class, 'index'])->name('index-broadcasts')->middleware('can:read broadcasts');
            $router->get('broadcasts/export', [AdminController::class, 'export'])->name('export-broadcasts')->middleware('can:read broadcasts');
            $router->get('broadcasts/create', [AdminController::class, 'create'])->name('create-broadcast')->middleware('can:create broadcasts');
            $router->get('broadcasts/{broadcast}/edit', [AdminController::class, 'edit'])->name('edit-broadcast')->middleware('can:read broadcasts');
            $router->post('broadcasts', [AdminController::class, 'store'])->name('store-broadcast')->middleware('can:create broadcasts');
            $router->put('broadcasts/{broadcast}', [AdminController::class, 'update'])->name('update-broadcast')->middleware('can:update broadcasts');

            $router->get('broadcasts/{broadcast}/dates/create', [DatesAdminController::class, 'create'])->name('create-broadcast_date')->middleware('can:update broadcasts');
            $router->get('broadcasts/{broadcast}/dates/{date}/edit', [DatesAdminController::class, 'edit'])->name('edit-broadcast_date')->middleware('can:update broadcasts');
            $router->post('broadcasts/{broadcast}/dates', [DatesAdminController::class, 'store'])->name('store-broadcast_date')->middleware('can:update broadcasts');
            $router->put('broadcasts/{broadcast}/dates/{date}', [DatesAdminController::class, 'update'])->name('update-broadcast_date')->middleware('can:update broadcasts');

            $router->get('broadcasts/{broadcast}/addresses/create', [AddressesAdminController::class, 'create'])->name('create-broadcast_address')->middleware('can:update broadcasts');
            $router->get('broadcasts/{broadcast}/addresses/{address}/edit', [AddressesAdminController::class, 'edit'])->name('edit-broadcast_address')->middleware('can:update broadcasts');
            $router->post('broadcasts/{broadcast}/addresses', [AddressesAdminController::class, 'store'])->name('store-broadcast_address')->middleware('can:update broadcasts');
            $router->put('broadcasts/{broadcast}/addresses/{address}', [AddressesAdminController::class, 'update'])->name('update-broadcast_address')->middleware('can:update broadcasts');
        });

        /*
         * API routes
         */
        Route::middleware(['api', 'auth:api'])->prefix('api')->group(function (Router $router) {
            $router->get('broadcasts', [ApiController::class, 'index'])->middleware('can:read broadcasts');
            $router->patch('broadcasts/{broadcast}', [ApiController::class, 'updatePartial'])->middleware('can:update broadcasts');
            $router->delete('broadcasts/{broadcast}', [ApiController::class, 'destroy'])->middleware('can:delete broadcasts');

            $router->get('broadcasts/{broadcast}/dates', [DatesApiController::class, 'index'])->middleware('can:update broadcasts');
            $router->patch('broadcasts/{broadcast}/dates/{date}', [DatesApiController::class, 'updatePartial'])->middleware('can:update broadcasts');
            $router->delete('broadcasts/{broadcast}/dates/{date}', [DatesApiController::class, 'destroy'])->middleware('can:update broadcasts');

            $router->get('broadcasts/{broadcast}/addresses', [AddressesApiController::class, 'index'])->middleware('can:update broadcasts');
            $router->patch('broadcasts/{broadcast}/addresses/{address}', [AddressesApiController::class, 'updatePartial'])->middleware('can:update broadcasts');
            $router->delete('broadcasts/{broadcast}/addresses/{address}', [AddressesApiController::class, 'destroy'])->middleware('can:update broadcasts');
        });
    }
}
