<?php

namespace TypiCMS\Modules\Broadcasts\Http\Controllers;

use Illuminate\View\View;
use TypiCMS\Modules\Core\Http\Controllers\BasePublicController;
use TypiCMS\Modules\Broadcasts\Models\BroadcastDate;
use TypiCMS\Modules\Broadcasts\Models\Broadcast;

class DatesPublicController extends BasePublicController
{
    public function show($slug, $dateSlug): View
    {
        $broadcast = Broadcast::published()->whereSlugIs($slug)->firstOrFail();
        $model = BroadcastDate::published()->whereSlugIs($dateSlug)->where('broadcast_id', $broadcast->id)->firstOrFail();

        return view('broadcasts::public.dates.show')
            ->with(compact('model'));
    }
}
