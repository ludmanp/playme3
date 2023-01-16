<?php

namespace TypiCMS\Modules\Projects\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use TypiCMS\Modules\Core\Facades\TypiCMS;
use TypiCMS\Modules\Projects\Http\Controllers\AdminController;
use TypiCMS\Modules\Projects\Http\Controllers\ApiController;
use TypiCMS\Modules\Projects\Http\Controllers\PublicController;

class RouteServiceProvider extends ServiceProvider
{
    public function map(): void
    {
        /*
         * Front office routes
         */
        if ($page = TypiCMS::getPageLinkedToModule('projects')) {
            $middleware = $page->private ? ['public', 'auth'] : ['public'];
            foreach (locales() as $lang) {
                if ($page->isPublished($lang) && $uri = $page->uri($lang)) {
                    Route::middleware($middleware)->prefix($uri)->name($lang.'::')->group(function (Router $router) {
                        $router->get('/', [PublicController::class, 'index'])->name('index-projects');
                        $router->get('/client/{client}', [PublicController::class, 'client'])->name('client-projects');
                        $router->get('{slug}', [PublicController::class, 'show'])->name('project');
                    });
                }
            }
        }

        /*
         * Admin routes
         */
        Route::middleware('admin')->prefix('admin')->name('admin::')->group(function (Router $router) {
            $router->get('projects', [AdminController::class, 'index'])->name('index-projects')->middleware('can:read projects');
            $router->get('projects/export', [AdminController::class, 'export'])->name('export-projects')->middleware('can:read projects');
            $router->get('projects/create', [AdminController::class, 'create'])->name('create-project')->middleware('can:create projects');
            $router->get('projects/{project}/edit', [AdminController::class, 'edit'])->name('edit-project')->middleware('can:read projects');
            $router->post('projects', [AdminController::class, 'store'])->name('store-project')->middleware('can:create projects');
            $router->put('projects/{project}', [AdminController::class, 'update'])->name('update-project')->middleware('can:update projects');
        });

        /*
         * API routes
         */
        Route::middleware(['api', 'auth:api'])->prefix('api')->group(function (Router $router) {
            $router->get('projects', [ApiController::class, 'index'])->middleware('can:read projects');
            $router->patch('projects/{project}', [ApiController::class, 'updatePartial'])->middleware('can:update projects');
            $router->delete('projects/{project}', [ApiController::class, 'destroy'])->middleware('can:delete projects');
        });
    }
}
