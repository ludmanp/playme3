<?php

namespace TypiCMS\Modules\Blogcategories\Http\Controllers;

use Illuminate\View\View;
use TypiCMS\Modules\Core\Http\Controllers\BasePublicController;
use TypiCMS\Modules\Blogcategories\Models\Blogcategory;

class PublicController extends BasePublicController
{
    public function index(): View
    {
        $models = Blogcategory::published()->order()->with('image')->get();

        return view('blogcategories::public.index')
            ->with(compact('models'));
    }

    public function show($slug): View
    {
        $model = Blogcategory::published()->whereSlugIs($slug)->firstOrFail();

        return view('blogcategories::public.show')
            ->with(compact('model'));
    }
}
