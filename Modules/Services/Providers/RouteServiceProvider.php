<?php

namespace TypiCMS\Modules\Services\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use TypiCMS\Modules\Core\Facades\TypiCMS;
use TypiCMS\Modules\Services\Http\Controllers\AdminController;
use TypiCMS\Modules\Services\Http\Controllers\ApiController;
use TypiCMS\Modules\Services\Http\Controllers\PublicController;
use TypiCMS\Modules\Services\Http\Controllers\DetailsAdminController;
use TypiCMS\Modules\Services\Http\Controllers\DetailsApiController;
use TypiCMS\Modules\Services\Http\Controllers\DetailsPublicController;

class RouteServiceProvider extends ServiceProvider
{
    public function map(): void
    {
        /*
         * Front office routes
         */
        if ($page = TypiCMS::getPageLinkedToModule('services')) {
            $middleware = $page->private ? ['public', 'auth'] : ['public'];
            foreach (locales() as $lang) {
                if ($page->isPublished($lang) && $uri = $page->uri($lang)) {
                    Route::middleware($middleware)->prefix($uri)->name($lang.'::')->group(function (Router $router) {
                        $router->get('/', [PublicController::class, 'index'])->name('index-services');
                        $router->get('{slug}', [PublicController::class, 'show'])->name('service');
                        $router->get('{slug}/{detailSlug}', [DetailsPublicController::class, 'show'])->name('service-detail');
                    });
                }
            }
        }

        /*
         * Admin routes
         */
        Route::middleware('admin')->prefix('admin')->name('admin::')->group(function (Router $router) {
            $router->get('services', [AdminController::class, 'index'])->name('index-services')->middleware('can:read services');
            $router->get('services/export', [AdminController::class, 'export'])->name('export-services')->middleware('can:read services');
            $router->get('services/create', [AdminController::class, 'create'])->name('create-service')->middleware('can:create services');
            $router->get('services/{service}/edit', [AdminController::class, 'edit'])->name('edit-service')->middleware('can:read services');
            $router->post('services', [AdminController::class, 'store'])->name('store-service')->middleware('can:create services');
            $router->put('services/{service}', [AdminController::class, 'update'])->name('update-service')->middleware('can:update services');

            $router->get('services/{service}/details/create', [DetailsAdminController::class, 'create'])->name('create-service_detail')->middleware('can:update services');
            $router->get('services/{service}/details/{detail}/edit', [DetailsAdminController::class, 'edit'])->name('edit-service_detail')->middleware('can:update services');
            $router->post('services/{service}/details', [DetailsAdminController::class, 'store'])->name('store-service_detail')->middleware('can:update services');
            $router->put('services/{service}/details/{detail}', [DetailsAdminController::class, 'update'])->name('update-service_detail')->middleware('can:update services');
        });

        /*
         * API routes
         */
        Route::middleware(['api', 'auth:api'])->prefix('api')->group(function (Router $router) {
            $router->get('services', [ApiController::class, 'index'])->middleware('can:read services');
            $router->patch('services/{service}', [ApiController::class, 'updatePartial'])->middleware('can:update services');
            $router->delete('services/{service}', [ApiController::class, 'destroy'])->middleware('can:delete services');

            $router->get('services/{service}/details', [DetailsApiController::class, 'index'])->middleware('can:update services');
            $router->patch('services/{service}/details/{detail}', [DetailsApiController::class, 'updatePartial'])->middleware('can:update services');
            $router->delete('services/{service}/details/{detail}', [DetailsApiController::class, 'destroy'])->middleware('can:update services');
        });
    }
}
