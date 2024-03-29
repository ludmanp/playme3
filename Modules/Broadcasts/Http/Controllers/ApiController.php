<?php

namespace TypiCMS\Modules\Broadcasts\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;
use TypiCMS\Modules\Core\Filters\FilterOr;
use TypiCMS\Modules\Core\Http\Controllers\BaseApiController;
use TypiCMS\Modules\Broadcasts\Models\Broadcast;

class ApiController extends BaseApiController
{
    public function index(Request $request): LengthAwarePaginator
    {
        $data = QueryBuilder::for(Broadcast::class)
            ->selectFields($request->input('fields.broadcasts'))
            ->allowedSorts(['status', 'title'])
            ->allowedFilters([
                AllowedFilter::custom('title', new FilterOr()),
            ])
            ->allowedIncludes(['image'])
            ->paginate($request->input('per_page'));

        return $data;
    }

    protected function updatePartial(Broadcast $broadcast, Request $request)
    {
        foreach ($request->only('status') as $key => $content) {
            if ($broadcast->isTranslatableAttribute($key)) {
                foreach ($content as $lang => $value) {
                    $broadcast->setTranslation($key, $lang, $value);
                }
            } else {
                $broadcast->{$key} = $content;
            }
        }

        $broadcast->save();
    }

    public function destroy(Broadcast $broadcast)
    {
        $broadcast->delete();
    }
}
