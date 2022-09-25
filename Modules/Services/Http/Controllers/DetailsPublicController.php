<?php

namespace TypiCMS\Modules\Services\Http\Controllers;

use Illuminate\View\View;
use TypiCMS\Modules\Core\Http\Controllers\BasePublicController;
use TypiCMS\Modules\Services\Models\ServiceDetail;
use TypiCMS\Modules\Services\Models\Service;

class DetailsPublicController extends BasePublicController
{
    public function show($slug, $detailSlug): View
    {
        $service = Service::published()->whereSlugIs($slug)->firstOrFail();
        $model = ServiceDetail::published()->whereSlugIs($detailSlug)->where('service_id', $service->id)->firstOrFail();

        return view('services::public.details.show')
            ->with(compact('model'));
    }
}
