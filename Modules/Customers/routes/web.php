<?php

use Illuminate\Routing\Router;
use \TypiCMS\Modules\Customers\Http\Controllers\RegisterController;
use \TypiCMS\Modules\Customers\Http\Controllers\ProfileController;
use TypiCMS\Modules\Core\Http\Middleware\JavaScriptData;


/*
 * Front office routes
 */
foreach (locales() as $lang) {
    Route::middleware(['public', JavaScriptData::class])->prefix($lang)->name($lang.'::')->group(function (Router $router) {
        if (config('typicms.register')) {
            // Registration
            $router->post('customer-register', [RegisterController::class, 'register'])->name('customer-register-action');
            // Verify
//            $router->get('email/verify', [VerificationController::class, 'show'])->name('verification.notice');
//            $router->get('email/verify/{id}', [VerificationController::class, 'verify'])->name('verification.verify');
//            $router->get('email/verified', [VerificationController::class, 'verified'])->name('verification.verified');
//            $router->get('email/resend', [VerificationController::class, 'resend'])->name('verification.resend');
        }
        Route::middleware('auth')->group(function (Router $router) {
            $router->get('profile', [ProfileController::class, 'index'])->name('customer-profile');
            $router->post('profile', [ProfileController::class, 'save'])->name('customer-profile-save');
            $router->post('change-password', [ProfileController::class, 'changePassword'])->name('customer-password-change');
        });
    });
}
