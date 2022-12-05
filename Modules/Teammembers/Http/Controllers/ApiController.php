<?php

namespace TypiCMS\Modules\Teammembers\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;
use TypiCMS\Modules\Core\Filters\FilterOr;
use TypiCMS\Modules\Core\Http\Controllers\BaseApiController;
use TypiCMS\Modules\Teammembers\Models\Teammember;

class ApiController extends BaseApiController
{
    public function index(Request $request): LengthAwarePaginator
    {
        $data = QueryBuilder::for(Teammember::class)
            ->selectFields($request->input('fields.teammembers'))
            ->allowedSorts(['status_translated', 'title_translated', 'name_translated', 'position'])
            ->allowedFilters([
                AllowedFilter::custom('title,name', new FilterOr()),
            ])
            ->allowedIncludes(['image', 'signature_image'])
            ->paginate($request->input('per_page'));

        return $data;
    }

    protected function updatePartial(Teammember $teammember, Request $request)
    {
        foreach ($request->only(['status', 'position']) as $key => $content) {
            if ($teammember->isTranslatableAttribute($key)) {
                foreach ($content as $lang => $value) {
                    $teammember->setTranslation($key, $lang, $value);
                }
            } else {
                $teammember->{$key} = $content;
            }
        }

        $teammember->save();
    }

    public function destroy(Teammember $teammember)
    {
        $teammember->delete();
    }
}
