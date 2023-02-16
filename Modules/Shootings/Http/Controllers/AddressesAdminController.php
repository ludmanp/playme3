<?php

namespace TypiCMS\Modules\Shootings\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use TypiCMS\Modules\Core\Http\Controllers\BaseAdminController;
use TypiCMS\Modules\Shootings\Http\Requests\AddressFormRequest;
use TypiCMS\Modules\Shootings\Models\Shooting;
use TypiCMS\Modules\Shootings\Models\ShootingAddress;

class AddressesAdminController extends BaseAdminController
{
    public function create(Shooting $shooting): View
    {
        $model = new ShootingAddress();

        return view('shootings::admin.addresses.create')
            ->with(compact('model', 'shooting'));
    }

    public function edit(Shooting $shooting, ShootingAddress $address): View
    {
        return view('shootings::admin.addresses.edit')
            ->with(['model' => $address, 'shooting' => $shooting]);
    }

    public function store(Shooting $shooting, AddressFormRequest $request): RedirectResponse
    {
        $address = ShootingAddress::create($request->validated());

        return $this->redirect($request, $address);
    }

    public function update(Shooting $shooting, ShootingAddress $address, AddressFormRequest $request): RedirectResponse
    {
        $address->update($request->validated());

        return $this->redirect($request, $address);
    }
}
