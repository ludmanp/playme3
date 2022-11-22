<?php

namespace TypiCMS\Modules\Articles\Http\Controllers;

use Illuminate\View\View;
use TypiCMS\Modules\Core\Http\Controllers\BasePublicController;
use TypiCMS\Modules\Articles\Models\Article;

class PublicController extends BasePublicController
{
    public function index(): View
    {
        $models = Article::published()->order()->with('image')->get();

        return view('articles::public.index')
            ->with(compact('models'));
    }

    public function show($slug): View
    {
        $model = Article::published()->whereSlugIs($slug)->firstOrFail();

        return view('articles::public.show')
            ->with(compact('model'));
    }
}
