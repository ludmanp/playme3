<?php

namespace TypiCMS\Modules\Authors\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;
use TypiCMS\Modules\Core\Filters\FilterOr;
use TypiCMS\Modules\Core\Http\Controllers\BaseApiController;
use TypiCMS\Modules\Authors\Models\Author;

class ApiController extends BaseApiController
{
    public function index(Request $request): LengthAwarePaginator
    {
        $data = QueryBuilder::for(Author::class)
            ->selectFields($request->input('fields.authors'))
            ->allowedSorts(['title_translated'])
            ->allowedFilters([
                AllowedFilter::custom('title', new FilterOr()),
            ])
            ->allowedIncludes(['image'])
            ->paginate($request->input('per_page'));

        return $data;
    }

    protected function updatePartial(Author $author, Request $request)
    {
        foreach ($request->only('status') as $key => $content) {
            if ($author->isTranslatableAttribute($key)) {
                foreach ($content as $lang => $value) {
                    $author->setTranslation($key, $lang, $value);
                }
            } else {
                $author->{$key} = $content;
            }
        }

        $author->save();
    }

    public function destroy(Author $author)
    {
        $author->delete();
    }
}
