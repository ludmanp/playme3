<?php

namespace TypiCMS\Modules\Shootings\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;
use TypiCMS\Modules\Core\Filters\FilterOr;
use TypiCMS\Modules\Core\Http\Controllers\BaseApiController;
use TypiCMS\Modules\Shootings\Models\Shooting;

class ApiController extends BaseApiController
{
    public function index(Request $request): LengthAwarePaginator
    {
        $data = QueryBuilder::for(Shooting::class)
            ->selectFields($request->input('fields.shootings'))
            ->allowedSorts(['status', 'title'])
            ->allowedFilters([
                AllowedFilter::custom('title', new FilterOr()),
            ])
            ->paginate($request->input('per_page'));

        return $data;
    }

    protected function updatePartial(Shooting $shooting, Request $request)
    {
        foreach ($request->only('status') as $key => $content) {
            if ($shooting->isTranslatableAttribute($key)) {
                foreach ($content as $lang => $value) {
                    $shooting->setTranslation($key, $lang, $value);
                }
            } else {
                $shooting->{$key} = $content;
            }
        }

        $shooting->save();
    }

    public function destroy(Shooting $shooting)
    {
        $shooting->delete();
    }
}
