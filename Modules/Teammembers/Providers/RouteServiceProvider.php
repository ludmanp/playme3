<?php

namespace TypiCMS\Modules\Teammembers\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use TypiCMS\Modules\Core\Facades\TypiCMS;
use TypiCMS\Modules\Teammembers\Http\Controllers\AdminController;
use TypiCMS\Modules\Teammembers\Http\Controllers\ApiController;
use TypiCMS\Modules\Teammembers\Http\Controllers\PublicController;
use TypiCMS\Modules\Teammembers\Http\Controllers\SocialsAdminController;
use TypiCMS\Modules\Teammembers\Http\Controllers\SocialsApiController;
use TypiCMS\Modules\Teammembers\Http\Controllers\SocialsPublicController;

class RouteServiceProvider extends ServiceProvider
{
    public function map(): void
    {
        /*
         * Front office routes
         */
        if ($page = TypiCMS::getPageLinkedToModule('teammembers')) {
            $middleware = $page->private ? ['public', 'auth'] : ['public'];
            foreach (locales() as $lang) {
                if ($page->isPublished($lang) && $uri = $page->uri($lang)) {
                    Route::middleware($middleware)->prefix($uri)->name($lang.'::')->group(function (Router $router) {
                        $router->get('/', [PublicController::class, 'index'])->name('index-teammembers');
                        $router->get('{slug}', [PublicController::class, 'show'])->name('teammember');
                    });
                }
            }
        }

        /*
         * Admin routes
         */
        Route::middleware('admin')->prefix('admin')->name('admin::')->group(function (Router $router) {
            $router->get('teammembers', [AdminController::class, 'index'])->name('index-teammembers')->middleware('can:read teammembers');
            $router->get('teammembers/export', [AdminController::class, 'export'])->name('export-teammembers')->middleware('can:read teammembers');
            $router->get('teammembers/create', [AdminController::class, 'create'])->name('create-teammember')->middleware('can:create teammembers');
            $router->get('teammembers/{teammember}/edit', [AdminController::class, 'edit'])->name('edit-teammember')->middleware('can:read teammembers');
            $router->post('teammembers', [AdminController::class, 'store'])->name('store-teammember')->middleware('can:create teammembers');
            $router->put('teammembers/{teammember}', [AdminController::class, 'update'])->name('update-teammember')->middleware('can:update teammembers');

            $router->get('teammembers/{teammember}/socials/create', [SocialsAdminController::class, 'create'])->name('create-teammember_social')->middleware('can:update teammembers');
            $router->get('teammembers/{teammember}/socials/{social}/edit', [SocialsAdminController::class, 'edit'])->name('edit-teammember_social')->middleware('can:update teammembers');
            $router->post('teammembers/{teammember}/socials', [SocialsAdminController::class, 'store'])->name('store-teammember_social')->middleware('can:update teammembers');
            $router->put('teammembers/{teammember}/socials/{social}', [SocialsAdminController::class, 'update'])->name('update-teammember_social')->middleware('can:update teammembers');
        });

        /*
         * API routes
         */
        Route::middleware(['api', 'auth:api'])->prefix('api')->group(function (Router $router) {
            $router->get('teammembers', [ApiController::class, 'index'])->middleware('can:read teammembers');
            $router->patch('teammembers/{teammember}', [ApiController::class, 'updatePartial'])->middleware('can:update teammembers');
            $router->delete('teammembers/{teammember}', [ApiController::class, 'destroy'])->middleware('can:delete teammembers');

            $router->get('teammembers/{teammember}/socials', [SocialsApiController::class, 'index'])->middleware('can:update teammembers');
            $router->patch('teammembers/{teammember}/socials/{social}', [SocialsApiController::class, 'updatePartial'])->middleware('can:update teammembers');
            $router->delete('teammembers/{teammember}/socials/{social}', [SocialsApiController::class, 'destroy'])->middleware('can:update teammembers');
        });
    }
}
