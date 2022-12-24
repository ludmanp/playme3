<?php

namespace TypiCMS\Modules\Broadcasts\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use TypiCMS\Modules\Core\Http\Controllers\BaseAdminController;
use TypiCMS\Modules\Broadcasts\Http\Requests\AddressFormRequest;
use TypiCMS\Modules\Broadcasts\Models\Broadcast;
use TypiCMS\Modules\Broadcasts\Models\BroadcastAddress;

class AddressesAdminController extends BaseAdminController
{
    public function create(Broadcast $broadcast): View
    {
        $model = new BroadcastAddress();

        return view('broadcasts::admin.addresses.create')
            ->with(compact('model', 'broadcast'));
    }

    public function edit(Broadcast $broadcast, BroadcastAddress $address): View
    {
        return view('broadcasts::admin.addresses.edit')
            ->with(['model' => $address, 'broadcast' => $broadcast]);
    }

    public function store(Broadcast $broadcast, AddressFormRequest $request): RedirectResponse
    {
        $address = BroadcastAddress::create($request->validated());

        return $this->redirect($request, $address);
    }

    public function update(Broadcast $broadcast, BroadcastAddress $address, AddressFormRequest $request): RedirectResponse
    {
        $address->update($request->validated());

        return $this->redirect($request, $address);
    }
}
