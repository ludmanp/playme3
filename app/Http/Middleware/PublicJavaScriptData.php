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
        if(auth()->check()) {
            $data['userData'] = [
                'id' => auth()->id(),
                'first_name' => auth()->user()->first_name,
                'last_name' => auth()->user()->last_name,
            ];
        }
        app('JavaScript')->put($data);

        return $next($request);
    }
}
