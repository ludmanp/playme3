<?php

namespace TypiCMS\Modules\Facts\Http\Controllers;

use Illuminate\View\View;
use TypiCMS\Modules\Core\Http\Controllers\BasePublicController;
use TypiCMS\Modules\Facts\Models\Fact;

class PublicController extends BasePublicController
{
    public function index(): View
    {
        $models = Fact::published()->order()->with('image')->get();

        return view('facts::public.index')
            ->with(compact('models'));
    }

    public function show($slug): View
    {
        $model = Fact::published()->whereSlugIs($slug)->firstOrFail();

        return view('facts::public.show')
            ->with(compact('model'));
    }
}
