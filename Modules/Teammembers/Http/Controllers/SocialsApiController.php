<?php

namespace TypiCMS\Modules\Teammembers\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;
use TypiCMS\Modules\Core\Filters\FilterOr;
use TypiCMS\Modules\Core\Http\Controllers\BaseApiController;
use TypiCMS\Modules\Teammembers\Models\TeammemberSocial;
use TypiCMS\Modules\Teammembers\Models\Teammember;


class SocialsApiController extends BaseApiController
{
    public function index(Teammember $teammember, Request $request): LengthAwarePaginator
    {
        $data = QueryBuilder::for(TeammemberSocial::class)
            ->selectFields($request->input('fields.teammember_socials'))
            ->allowedSorts(['status_translated', 'title', 'position'])
            ->allowedFilters([
                AllowedFilter::custom('title', new FilterOr()),
            ])
            ->allowedIncludes(['image'])
            ->where('teammember_id', $teammember->id)
            ->paginate($request->input('per_page'));

        return $data;
    }

    protected function updatePartial(Teammember $teammember, TeammemberSocial $social, Request $request)
    {
        foreach ($request->only(['status', 'position']) as $key => $content) {
            if (method_exists($social, 'isTranslatableAttribute') && $social->isTranslatableAttribute($key)) {
                foreach ($content as $lang => $value) {
                    $social->setTranslation($key, $lang, $value);
                }
            } else {
                $social->{$key} = $content;
            }
        }

        $social->save();
    }

    public function destroy(Teammember $teammember, TeammemberSocial $social)
    {
        $social->delete();
    }
}
