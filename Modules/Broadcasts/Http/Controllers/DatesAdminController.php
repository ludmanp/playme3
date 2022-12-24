<?php

namespace TypiCMS\Modules\Broadcasts\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use TypiCMS\Modules\Core\Http\Controllers\BaseAdminController;
use TypiCMS\Modules\Broadcasts\Http\Requests\DateFormRequest;
use TypiCMS\Modules\Broadcasts\Models\Broadcast;
use TypiCMS\Modules\Broadcasts\Models\BroadcastDate;

class DatesAdminController extends BaseAdminController
{
    public function create(Broadcast $broadcast): View
    {
        $model = new BroadcastDate();

        return view('broadcasts::admin.dates.create')
            ->with(compact('model', 'broadcast'));
    }

    public function edit(Broadcast $broadcast, BroadcastDate $date): View
    {
        return view('broadcasts::admin.dates.edit')
            ->with(['model' => $date, 'broadcast' => $broadcast]);
    }

    public function store(Broadcast $broadcast, DateFormRequest $request): RedirectResponse
    {
        $date = BroadcastDate::create($request->validated());

        return $this->redirect($request, $date);
    }

    public function update(Broadcast $broadcast, BroadcastDate $date, DateFormRequest $request): RedirectResponse
    {
        $date->update($request->validated());

        return $this->redirect($request, $date);
    }
}
