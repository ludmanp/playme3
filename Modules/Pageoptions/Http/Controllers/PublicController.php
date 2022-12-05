<?php

namespace TypiCMS\Modules\Pageoptions\Http\Controllers;

use Illuminate\View\View;
use TypiCMS\Modules\Core\Http\Controllers\BasePublicController;
use TypiCMS\Modules\Pageoptions\Models\Pageoption;

class PublicController extends BasePublicController
{
    public function index(): View
    {
        $models = Pageoption::published()->order()->with('image')->get();

        return view('pageoptions::public.index')
            ->with(compact('models'));
    }

    public function show($slug): View
    {
        $model = Pageoption::published()->whereSlugIs($slug)->firstOrFail();

        return view('pageoptions::public.show')
            ->with(compact('model'));
    }
}
