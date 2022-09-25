<?php

namespace TypiCMS\Modules\Services\Http\Controllers;

use Illuminate\View\View;
use TypiCMS\Modules\Core\Http\Controllers\BasePublicController;
use TypiCMS\Modules\Services\Models\Service;

class PublicController extends BasePublicController
{
    public function index()
    {
        $service = Service::published()->order()->first();
        if(!$service) {
            abort(404);
        }
        $detail = $service->published_details->first();

        if($detail) {
            return redirect(url($detail->uri()));
        }
        return redirect(url($service->uri()));
    }

    public function show($slug)
    {
        $model = Service::query()->with('published_details')->published()->whereSlugIs($slug)->firstOrFail();

        if($detail = $model->published_details->first()) {
            return redirect(url($detail->uri()));
        }

        return view('services::public.show')
            ->with(compact('model'));
    }
}
