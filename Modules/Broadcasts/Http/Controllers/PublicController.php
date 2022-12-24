<?php

namespace TypiCMS\Modules\Broadcasts\Http\Controllers;

use Illuminate\View\View;
use TypiCMS\Modules\Core\Http\Controllers\BasePublicController;
use TypiCMS\Modules\Broadcasts\Models\Broadcast;

class PublicController extends BasePublicController
{
    public function index(): View
    {
        $models = Broadcast::published()->order()->with('image')->get();

        return view('broadcasts::public.index')
            ->with(compact('models'));
    }

    public function show($slug): View
    {
        $model = Broadcast::published()->whereSlugIs($slug)->firstOrFail();

        return view('broadcasts::public.show')
            ->with(compact('model'));
    }

    public function create(): View
    {
        return view('broadcasts::public.create');
    }
}
