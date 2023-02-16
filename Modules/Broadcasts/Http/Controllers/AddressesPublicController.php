<?php

namespace TypiCMS\Modules\Broadcasts\Http\Controllers;

use Illuminate\View\View;
use TypiCMS\Modules\Core\Http\Controllers\BasePublicController;
use TypiCMS\Modules\Broadcasts\Models\BroadcastAddress;
use TypiCMS\Modules\Broadcasts\Models\Broadcast;

class AddressesPublicController extends BasePublicController
{
    public function show($slug, $addressSlug): View
    {
        $broadcast = Broadcast::published()->whereSlugIs($slug)->firstOrFail();
        $model = BroadcastAddress::published()->whereSlugIs($addressSlug)->where('broadcast_id', $broadcast->id)->firstOrFail();

        return view('broadcasts::public.addresses.show')
            ->with(compact('model'));
    }
}
