<?php

namespace TypiCMS\Modules\Shootings\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use TypiCMS\Modules\Core\Http\Controllers\BaseAdminController;
use TypiCMS\Modules\Shootings\Http\Requests\DateFormRequest;
use TypiCMS\Modules\Shootings\Models\Shooting;
use TypiCMS\Modules\Shootings\Models\ShootingDate;

class DatesAdminController extends BaseAdminController
{
    public function create(Shooting $shooting): View
    {
        $model = new ShootingDate();

        return view('shootings::admin.dates.create')
            ->with(compact('model', 'shooting'));
    }

    public function edit(Shooting $shooting, ShootingDate $date): View
    {
        return view('shootings::admin.dates.edit')
            ->with(['model' => $date, 'shooting' => $shooting]);
    }

    public function store(Shooting $shooting, DateFormRequest $request): RedirectResponse
    {
        $date = ShootingDate::create($request->validated());

        return $this->redirect($request, $date);
    }

    public function update(Shooting $shooting, ShootingDate $date, DateFormRequest $request): RedirectResponse
    {
        $date->update($request->validated());

        return $this->redirect($request, $date);
    }
}
