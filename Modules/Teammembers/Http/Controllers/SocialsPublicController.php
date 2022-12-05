<?php

namespace TypiCMS\Modules\Teammembers\Http\Controllers;

use Illuminate\View\View;
use TypiCMS\Modules\Core\Http\Controllers\BasePublicController;
use TypiCMS\Modules\Teammembers\Models\TeammemberSocial;
use TypiCMS\Modules\Teammembers\Models\Teammember;

class SocialsPublicController extends BasePublicController
{
    public function show($slug, $socialSlug): View
    {
        $teammember = Teammember::published()->whereSlugIs($slug)->firstOrFail();
        $model = TeammemberSocial::published()->whereSlugIs($socialSlug)->where('teammember_id', $teammember->id)->firstOrFail();

        return view('teammembers::public.socials.show')
            ->with(compact('model'));
    }
}
