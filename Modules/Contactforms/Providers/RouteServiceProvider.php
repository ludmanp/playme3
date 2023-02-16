<?php

namespace TypiCMS\Modules\Contactforms\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use TypiCMS\Modules\Core\Facades\TypiCMS;
use TypiCMS\Modules\Contactforms\Http\Controllers\AdminController;
use TypiCMS\Modules\Contactforms\Http\Controllers\ApiController;
use TypiCMS\Modules\Contactforms\Http\Controllers\PublicController;

class RouteServiceProvider extends ServiceProvider
{
    public function map(): void
    {
        /*
         * Front office routes
         */
        if ($page = TypiCMS::getPageLinkedToModule('contactforms')) {
            $middleware = $page->private ? ['public', 'auth'] : ['public'];
            foreach (locales() as $lang) {
                if ($page->isPublished($lang) && $uri = $page->uri($lang)) {
                    Route::middleware($middleware)->prefix($uri)->name($lang.'::')->group(function (Router $router) {
                        $router->get('/', [PublicController::class, 'index'])->name('index-contactforms');
                        $router->get('{slug}', [PublicController::class, 'show'])->name('contactform');
                    });
                }
            }
        }

        foreach (locales() as $lang) {
            Route::middleware(['public'])->prefix($lang)->name($lang.'::')->group(function (Router $router) {
                $router->post('contact-form', [PublicController::class, 'store'])->name('contact-form');
            });
        }

        /*
         * Admin routes
         */
        Route::middleware('admin')->prefix('admin')->name('admin::')->group(function (Router $router) {
            $router->get('contactforms', [AdminController::class, 'index'])->name('index-contactforms')->middleware('can:read contactforms');
            $router->get('contactforms/export', [AdminController::class, 'export'])->name('export-contactforms')->middleware('can:read contactforms');
            $router->get('contactforms/create', [AdminController::class, 'create'])->name('create-contactform')->middleware('can:create contactforms');
            $router->get('contactforms/{contactform}/edit', [AdminController::class, 'edit'])->name('edit-contactform')->middleware('can:read contactforms');
            $router->post('contactforms', [AdminController::class, 'store'])->name('store-contactform')->middleware('can:create contactforms');
            $router->put('contactforms/{contactform}', [AdminController::class, 'update'])->name('update-contactform')->middleware('can:update contactforms');
        });

        /*
         * API routes
         */
        Route::middleware(['api', 'auth:api'])->prefix('api')->group(function (Router $router) {
            $router->get('contactforms', [ApiController::class, 'index'])->middleware('can:read contactforms');
            $router->patch('contactforms/{contactform}', [ApiController::class, 'updatePartial'])->middleware('can:update contactforms');
            $router->delete('contactforms/{contactform}', [ApiController::class, 'destroy'])->middleware('can:delete contactforms');
        });
    }
}
