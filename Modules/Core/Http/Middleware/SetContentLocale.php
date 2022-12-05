<?php

namespace TypiCMS\Modules\Core\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SetContentLocale
{
    /**
     * Handle an incoming request.
     *
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Store requested locale in session.
        $localeFromRequest = $request->input('locale');
        if (in_array($localeFromRequest, locales())) {
            session(['content_locale' => $localeFromRequest]);
        }

        Log::debug('SetContentLocale request locale ' . $localeFromRequest);

        // Set content locale.
        $contentLocale = session('content_locale', config('app.locale'));
        if (in_array($contentLocale, locales())) {
            config(['typicms.content_locale' => $contentLocale]);
            Log::debug('SetContentLocale typicms.content_locale ' . $contentLocale);
        }

        return $next($request);
    }
}
