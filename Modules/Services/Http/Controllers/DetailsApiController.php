<?php

namespace TypiCMS\Modules\Services\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;
use TypiCMS\Modules\Core\Filters\FilterOr;
use TypiCMS\Modules\Core\Http\Controllers\BaseApiController;
use TypiCMS\Modules\Services\Models\ServiceDetail;
use TypiCMS\Modules\Services\Models\Service;


class DetailsApiController extends BaseApiController
{
    public function index(Service $service, Request $request): LengthAwarePaginator
    {
        $data = QueryBuilder::for(ServiceDetail::class)
            ->selectFields($request->input('fields.service_details'))
            ->allowedSorts(['status_translated', 'title_translated', 'position'])
            ->allowedFilters([
                AllowedFilter::custom('title', new FilterOr()),
            ])
            ->allowedIncludes(['image'])
            ->where('service_id', $service->id)
            ->paginate($request->input('per_page'));

        return $data;
    }

    protected function updatePartial(Service $service, ServiceDetail $detail, Request $request)
    {
        foreach ($request->only(['status', 'position']) as $key => $content) {
            if (method_exists($detail, 'isTranslatableAttribute') && $detail->isTranslatableAttribute($key)) {
                foreach ($content as $lang => $value) {
                    $detail->setTranslation($key, $lang, $value);
                }
            } else {
                $detail->{$key} = $content;
            }
        }

        $detail->save();
    }

    public function destroy(Service $service, ServiceDetail $detail)
    {
        $detail->delete();
    }
}
