<?php

namespace TypiCMS\Modules\Broadcasts\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;
use TypiCMS\Modules\Core\Filters\FilterOr;
use TypiCMS\Modules\Core\Http\Controllers\BaseApiController;
use TypiCMS\Modules\Broadcasts\Models\BroadcastDate;
use TypiCMS\Modules\Broadcasts\Models\Broadcast;


class DatesApiController extends BaseApiController
{
    public function index(Broadcast $broadcast, Request $request): LengthAwarePaginator
    {
        $data = QueryBuilder::for(BroadcastDate::class)
            ->selectFields($request->input('fields.broadcast_dates'))
            ->allowedSorts(['status_translated', 'title_translated', 'position'])
            ->allowedFilters([
                AllowedFilter::custom('title', new FilterOr()),
            ])
            ->allowedIncludes(['image'])
            ->where('broadcast_id', $broadcast->id)
            ->paginate($request->input('per_page'));

        return $data;
    }

    protected function updatePartial(Broadcast $broadcast, BroadcastDate $date, Request $request)
    {
        foreach ($request->only(['status', 'position']) as $key => $content) {
            if (method_exists($date, 'isTranslatableAttribute') && $date->isTranslatableAttribute($key)) {
                foreach ($content as $lang => $value) {
                    $date->setTranslation($key, $lang, $value);
                }
            } else {
                $date->{$key} = $content;
            }
        }

        $date->save();
    }

    public function destroy(Broadcast $broadcast, BroadcastDate $date)
    {
        $date->delete();
    }
}
