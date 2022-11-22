<?php

namespace TypiCMS\Modules\Blogcategories\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use TypiCMS\Modules\Core\Facades\TypiCMS;
use TypiCMS\Modules\Blogcategories\Http\Controllers\AdminController;
use TypiCMS\Modules\Blogcategories\Http\Controllers\ApiController;
use TypiCMS\Modules\Blogcategories\Http\Controllers\PublicController;

class RouteServiceProvider extends ServiceProvider
{
    public function map(): void
    {
        /*
         * Front office routes
         */
        if ($page = TypiCMS::getPageLinkedToModule('blogcategories')) {
            $middleware = $page->private ? ['public', 'auth'] : ['public'];
            foreach (locales() as $lang) {
                if ($page->isPublished($lang) && $uri = $page->uri($lang)) {
                    Route::middleware($middleware)->prefix($uri)->name($lang.'::')->group(function (Router $router) {
                        $router->get('/', [PublicController::class, 'index'])->name('index-blogcategories');
                        $router->get('{slug}', [PublicController::class, 'show'])->name('blogcategory');
                    });
                }
            }
        }

        /*
         * Admin routes
         */
        Route::middleware('admin')->prefix('admin')->name('admin::')->group(function (Router $router) {
            $router->get('blogcategories', [AdminController::class, 'index'])->name('index-blogcategories')->middleware('can:read blogcategories');
            $router->get('blogcategories/export', [AdminController::class, 'export'])->name('export-blogcategories')->middleware('can:read blogcategories');
            $router->get('blogcategories/create', [AdminController::class, 'create'])->name('create-blogcategory')->middleware('can:create blogcategories');
            $router->get('blogcategories/{blogcategory}/edit', [AdminController::class, 'edit'])->name('edit-blogcategory')->middleware('can:read blogcategories');
            $router->post('blogcategories', [AdminController::class, 'store'])->name('store-blogcategory')->middleware('can:create blogcategories');
            $router->put('blogcategories/{blogcategory}', [AdminController::class, 'update'])->name('update-blogcategory')->middleware('can:update blogcategories');
        });

        /*
         * API routes
         */
        Route::middleware(['api', 'auth:api'])->prefix('api')->group(function (Router $router) {
            $router->get('blogcategories', [ApiController::class, 'index'])->middleware('can:read blogcategories');
            $router->patch('blogcategories/{blogcategory}', [ApiController::class, 'updatePartial'])->middleware('can:update blogcategories');
            $router->delete('blogcategories/{blogcategory}', [ApiController::class, 'destroy'])->middleware('can:delete blogcategories');
        });
    }
}
