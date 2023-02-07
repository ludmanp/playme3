<?php

namespace TypiCMS\Modules\Shootings\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use TypiCMS\Modules\Shootings\Http\Controllers\AddressesApiController;
use TypiCMS\Modules\Shootings\Http\Controllers\DatesApiController;
use TypiCMS\Modules\Shootings\Http\Controllers\AddressesAdminController;
use TypiCMS\Modules\Shootings\Http\Controllers\DatesAdminController;
use TypiCMS\Modules\Core\Facades\TypiCMS;
use TypiCMS\Modules\Shootings\Http\Controllers\AdminController;
use TypiCMS\Modules\Shootings\Http\Controllers\ApiController;
use TypiCMS\Modules\Shootings\Http\Controllers\PublicController;

class RouteServiceProvider extends ServiceProvider
{
    public function map(): void
    {
        /*
         * Front office routes
         */
        foreach (locales() as $lang) {
            Route::middleware(['public'])->prefix($lang . '/shooting')->name($lang.'::')->group(function (Router $router) {
                Route::middleware(['auth'])->group(function (Router $router) {
                    $router->get('create', [\TypiCMS\Modules\Shootings\Http\Controllers\PublicController::class, 'create'])->name('create-shooting');
                    $router->post('create', [PublicController::class, 'store'])->name('store-shooting');
                    $router->get('{slug}/edit', [PublicController::class, 'edit'])->name('edit-shooting');
                    $router->post('{slug}/edit', [PublicController::class, 'update'])->name('update-shooting');
                });
            });
        }

        /*
         * Admin routes
         */
        Route::middleware('admin')->prefix('admin')->name('admin::')->group(function (Router $router) {
            $router->get('shootings', [AdminController::class, 'index'])->name('index-shootings')->middleware('can:read shootings');
            $router->get('shootings/export', [AdminController::class, 'export'])->name('export-shootings')->middleware('can:read shootings');
            $router->get('shootings/create', [AdminController::class, 'create'])->name('create-shooting')->middleware('can:create shootings');
            $router->get('shootings/{shooting}/edit', [AdminController::class, 'edit'])->name('edit-shooting')->middleware('can:read shootings');
            $router->post('shootings', [AdminController::class, 'store'])->name('store-shooting')->middleware('can:create shootings');
            $router->put('shootings/{shooting}', [AdminController::class, 'update'])->name('update-shooting')->middleware('can:update shootings');

            $router->get('shootings/{shooting}/dates/create', [DatesAdminController::class, 'create'])->name('create-shooting_date')->middleware('can:update shootings');
            $router->get('shootings/{shooting}/dates/{date}/edit', [DatesAdminController::class, 'edit'])->name('edit-shooting_date')->middleware('can:update shootings');
            $router->post('shootings/{shooting}/dates', [DatesAdminController::class, 'store'])->name('store-shooting_date')->middleware('can:update shootings');
            $router->put('shootings/{shooting}/dates/{date}', [DatesAdminController::class, 'update'])->name('update-shooting_date')->middleware('can:update shootings');

            $router->get('shootings/{shooting}/addresses/create', [AddressesAdminController::class, 'create'])->name('create-shooting_address')->middleware('can:update shootings');
            $router->get('shootings/{shooting}/addresses/{address}/edit', [AddressesAdminController::class, 'edit'])->name('edit-shooting_address')->middleware('can:update shootings');
            $router->post('shootings/{shooting}/addresses', [AddressesAdminController::class, 'store'])->name('store-shooting_address')->middleware('can:update shootings');
            $router->put('shootings/{shooting}/addresses/{address}', [AddressesAdminController::class, 'update'])->name('update-shooting_address')->middleware('can:update shootings');

        });

        /*
         * API routes
         */
        Route::middleware(['api', 'auth:api'])->prefix('api')->group(function (Router $router) {
            $router->get('shootings', [ApiController::class, 'index'])->middleware('can:read shootings');
            $router->patch('shootings/{shooting}', [ApiController::class, 'updatePartial'])->middleware('can:update shootings');
            $router->delete('shootings/{shooting}', [ApiController::class, 'destroy'])->middleware('can:delete shootings');

            $router->get('shootings/{shooting}/dates', [DatesApiController::class, 'index'])->middleware('can:update shootings');
            $router->patch('shootings/{shooting}/dates/{date}', [DatesApiController::class, 'updatePartial'])->middleware('can:update shootings');
            $router->delete('shootings/{shooting}/dates/{date}', [DatesApiController::class, 'destroy'])->middleware('can:update shootings');

            $router->get('shootings/{shooting}/addresses', [AddressesApiController::class, 'index'])->middleware('can:update shootings');
            $router->patch('shootings/{shooting}/addresses/{address}', [AddressesApiController::class, 'updatePartial'])->middleware('can:update shootings');
            $router->delete('shootings/{shooting}/addresses/{address}', [AddressesApiController::class, 'destroy'])->middleware('can:update shootings');
        });
    }
}
