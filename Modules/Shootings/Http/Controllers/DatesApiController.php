<?php

namespace TypiCMS\Modules\Shootings\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;
use TypiCMS\Modules\Core\Filters\FilterOr;
use TypiCMS\Modules\Core\Http\Controllers\BaseApiController;
use TypiCMS\Modules\Shootings\Models\ShootingDate;
use TypiCMS\Modules\Shootings\Models\Shooting;


class DatesApiController extends BaseApiController
{
    public function index(Shooting $shooting, Request $request): LengthAwarePaginator
    {
        $data = QueryBuilder::for(ShootingDate::class)
            ->selectFields($request->input('fields.shooting_dates'))
            ->allowedSorts(['starts_at', 'position'])
            ->allowedFilters([
                AllowedFilter::custom('starts_at', new FilterOr()),
            ])
            ->where('shooting_id', $shooting->id)
            ->paginate($request->input('per_page'));

        return $data;
    }

    protected function updatePartial(Shooting $shooting, ShootingDate $date, Request $request)
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

    public function destroy(Shooting $shooting, ShootingDate $date)
    {
        $date->delete();
    }
}
