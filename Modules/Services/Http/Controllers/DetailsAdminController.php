<?php

namespace TypiCMS\Modules\Services\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use TypiCMS\Modules\Core\Http\Controllers\BaseAdminController;
use TypiCMS\Modules\Services\Http\Requests\DetailFormRequest;
use TypiCMS\Modules\Services\Models\Service;
use TypiCMS\Modules\Services\Models\ServiceDetail;

class DetailsAdminController extends BaseAdminController
{
    public function create(Service $service): View
    {
        $model = new ServiceDetail();

        return view('services::admin.details.create')
            ->with(compact('model', 'service'));
    }

    public function edit(Service $service, ServiceDetail $detail): View
    {
        return view('services::admin.details.edit')
            ->with(['model' => $detail, 'service' => $service]);
    }

    public function store(Service $service, DetailFormRequest $request): RedirectResponse
    {
        $detail = ServiceDetail::create($request->validated());

        return $this->redirect($request, $detail);
    }

    public function update(Service $service, ServiceDetail $detail, DetailFormRequest $request): RedirectResponse
    {
        $detail->update($request->validated());

        return $this->redirect($request, $detail);
    }
}
