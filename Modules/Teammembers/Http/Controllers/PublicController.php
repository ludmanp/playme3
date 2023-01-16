<?php

namespace TypiCMS\Modules\Teammembers\Http\Controllers;

use Illuminate\View\View;
use TypiCMS\Modules\Core\Http\Controllers\BasePublicController;
use TypiCMS\Modules\Teammembers\Models\Teammember;

class PublicController extends BasePublicController
{
    public function index()
    {
        /** @var Teammember $teammember */
        $teamMember = Teammember::published()->order()->first();
        if($teamMember) {
            return redirect(url($teamMember->uri()));
        }
        abort(404);

    }

    public function show($slug): View
    {
        $model = Teammember::with(['image', 'projects'])->published()->whereSlugIs($slug)->firstOrFail();
        $models = Teammember::published()->order()->get();

        return view('teammembers::public.show')
            ->with(compact('model', 'models'));
    }
}
