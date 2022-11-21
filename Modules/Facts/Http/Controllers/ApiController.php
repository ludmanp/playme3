<?php

namespace TypiCMS\Modules\Facts\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;
use TypiCMS\Modules\Core\Filters\FilterOr;
use TypiCMS\Modules\Core\Http\Controllers\BaseApiController;
use TypiCMS\Modules\Facts\Models\Fact;

class ApiController extends BaseApiController
{
    public function index(Request $request): LengthAwarePaginator
    {
        $data = QueryBuilder::for(Fact::class)
            ->selectFields($request->input('fields.facts'))
            ->allowedSorts(['status_translated', 'title_translated', 'position'])
            ->allowedFilters([
                AllowedFilter::custom('title,link_title', new FilterOr()),
            ])
            ->allowedIncludes(['image'])
            ->paginate($request->input('per_page'));

        return $data;
    }

    protected function updatePartial(Fact $fact, Request $request)
    {
        foreach ($request->only(['status', 'position']) as $key => $content) {
            if ($fact->isTranslatableAttribute($key)) {
                foreach ($content as $lang => $value) {
                    $fact->setTranslation($key, $lang, $value);
                }
            } else {
                $fact->{$key} = $content;
            }
        }

        $fact->save();
    }

    public function destroy(Fact $fact)
    {
        $fact->delete();
    }
}
