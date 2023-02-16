<?php

namespace TypiCMS\Modules\Clients\Http\Controllers;

use Illuminate\View\View;
use TypiCMS\Modules\Core\Http\Controllers\BasePublicController;
use TypiCMS\Modules\Clients\Models\Client;

class PublicController extends BasePublicController
{
    public function index(): View
    {
        $models = Client::published()->order()->with('image')->get();

        return view('clients::public.index')
            ->with(compact('models'));
    }

    public function show($slug): View
    {
        $model = Client::query()->with('published_projects')->published()->whereSlugIs($slug)->firstOrFail();

        return view('clients::public.show')
            ->with(compact('model'));
    }
}
