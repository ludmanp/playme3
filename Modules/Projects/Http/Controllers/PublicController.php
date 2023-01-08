<?php

namespace TypiCMS\Modules\Projects\Http\Controllers;

use Illuminate\View\View;
use TypiCMS\Modules\Core\Http\Controllers\BasePublicController;
use TypiCMS\Modules\Projects\Models\Project;

class PublicController extends BasePublicController
{
    public function index(): View
    {
        $models = Project::published()->order()->with('image')->get();

        return view('projects::public.index')
            ->with(compact('models'));
    }

    public function show($slug): View
    {
        $model = Project::published()->whereSlugIs($slug)->firstOrFail();

        return view('projects::public.show')
            ->with(compact('model'));
    }
}
