<?php

namespace TypiCMS\Modules\Authors\Http\Controllers;

use Illuminate\View\View;
use TypiCMS\Modules\Core\Http\Controllers\BasePublicController;
use TypiCMS\Modules\Authors\Models\Author;

class PublicController extends BasePublicController
{
    public function index(): View
    {
        $models = Author::published()->order()->with('image')->get();

        return view('authors::public.index')
            ->with(compact('models'));
    }

    public function show($slug): View
    {
        $model = Author::published()->whereSlugIs($slug)->firstOrFail();

        return view('authors::public.show')
            ->with(compact('model'));
    }
}
