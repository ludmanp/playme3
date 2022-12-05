<?php

namespace TypiCMS\Modules\Blogcategories\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;
use TypiCMS\Modules\Core\Filters\FilterOr;
use TypiCMS\Modules\Core\Http\Controllers\BaseApiController;
use TypiCMS\Modules\Blogcategories\Models\Blogcategory;

class ApiController extends BaseApiController
{
    public function index(Request $request): LengthAwarePaginator
    {
        $data = QueryBuilder::for(Blogcategory::class)
            ->selectFields($request->input('fields.blogcategories'))
            ->allowedSorts(['status_translated', 'title_translated'])
            ->allowedFilters([
                AllowedFilter::custom('title', new FilterOr()),
            ])
            ->paginate($request->input('per_page'));

        return $data;
    }

    protected function updatePartial(Blogcategory $blogcategory, Request $request)
    {
        foreach ($request->only(['status', 'position']) as $key => $content) {
            if ($blogcategory->isTranslatableAttribute($key)) {
                foreach ($content as $lang => $value) {
                    $blogcategory->setTranslation($key, $lang, $value);
                }
            } else {
                $blogcategory->{$key} = $content;
            }
        }

        $blogcategory->save();
    }

    public function destroy(Blogcategory $blogcategory)
    {
        $blogcategory->delete();
    }
}
