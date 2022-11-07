<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use TypiCMS\Modules\Core\Facades\TypiCMS;

class PublicJavaScriptData
{
    public function handle(Request $request, Closure $next)
    {
        $data = [
            'locale' => app()->getLocale(),
        ];
        app('JavaScript')->put($data);

        return $next($request);
    }
}
