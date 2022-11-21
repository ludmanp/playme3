<?php

namespace TypiCMS\Modules\Teammembers\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use TypiCMS\Modules\Core\Http\Controllers\BaseAdminController;
use TypiCMS\Modules\Teammembers\Http\Requests\SocialFormRequest;
use TypiCMS\Modules\Teammembers\Models\Teammember;
use TypiCMS\Modules\Teammembers\Models\TeammemberSocial;

class SocialsAdminController extends BaseAdminController
{
    public function create(Teammember $teammember): View
    {
        $model = new TeammemberSocial();

        return view('teammembers::admin.socials.create')
            ->with(compact('model', 'teammember'));
    }

    public function edit(Teammember $teammember, TeammemberSocial $social): View
    {
        return view('teammembers::admin.socials.edit')
            ->with(['model' => $social, 'teammember' => $teammember]);
    }

    public function store(Teammember $teammember, SocialFormRequest $request): RedirectResponse
    {
        $social = TeammemberSocial::create($request->validated());

        return $this->redirect($request, $social);
    }

    public function update(Teammember $teammember, TeammemberSocial $social, SocialFormRequest $request): RedirectResponse
    {
        $social->update($request->validated());

        return $this->redirect($request, $social);
    }
}
