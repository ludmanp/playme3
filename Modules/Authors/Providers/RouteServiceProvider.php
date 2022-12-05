<?php

namespace TypiCMS\Modules\Authors\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use TypiCMS\Modules\Core\Facades\TypiCMS;
use TypiCMS\Modules\Authors\Http\Controllers\AdminController;
use TypiCMS\Modules\Authors\Http\Controllers\ApiController;
use TypiCMS\Modules\Authors\Http\Controllers\PublicController;

class RouteServiceProvider extends ServiceProvider
{
    public function map(): void
    {
        /*
         * Front office routes
         */
        if ($page = TypiCMS::getPageLinkedToModule('authors')) {
            $middleware = $page->private ? ['public', 'auth'] : ['public'];
            foreach (locales() as $lang) {
                if ($page->isPublished($lang) && $uri = $page->uri($lang)) {
                    Route::middleware($middleware)->prefix($uri)->name($lang.'::')->group(function (Router $router) {
                        $router->get('/', [PublicController::class, 'index'])->name('index-authors');
                        $router->get('{slug}', [PublicController::class, 'show'])->name('author');
                    });
                }
            }
        }

        /*
         * Admin routes
         */
        Route::middleware('admin')->prefix('admin')->name('admin::')->group(function (Router $router) {
            $router->get('authors', [AdminController::class, 'index'])->name('index-authors')->middleware('can:read authors');
            $router->get('authors/export', [AdminController::class, 'export'])->name('export-authors')->middleware('can:read authors');
            $router->get('authors/create', [AdminController::class, 'create'])->name('create-author')->middleware('can:create authors');
            $router->get('authors/{author}/edit', [AdminController::class, 'edit'])->name('edit-author')->middleware('can:read authors');
            $router->post('authors', [AdminController::class, 'store'])->name('store-author')->middleware('can:create authors');
            $router->put('authors/{author}', [AdminController::class, 'update'])->name('update-author')->middleware('can:update authors');
        });

        /*
         * API routes
         */
        Route::middleware(['api', 'auth:api'])->prefix('api')->group(function (Router $router) {
            $router->get('authors', [ApiController::class, 'index'])->middleware('can:read authors');
            $router->patch('authors/{author}', [ApiController::class, 'updatePartial'])->middleware('can:update authors');
            $router->delete('authors/{author}', [ApiController::class, 'destroy'])->middleware('can:delete authors');
        });
    }
}
