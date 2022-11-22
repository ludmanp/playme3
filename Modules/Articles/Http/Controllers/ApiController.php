<?php

namespace TypiCMS\Modules\Articles\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;
use TypiCMS\Modules\Core\Filters\FilterOr;
use TypiCMS\Modules\Core\Http\Controllers\BaseApiController;
use TypiCMS\Modules\Articles\Models\Article;

class ApiController extends BaseApiController
{
    public function index(Request $request): LengthAwarePaginator
    {
        $data = QueryBuilder::for(Article::class)
            ->selectFields($request->input('fields.articles'))
            ->allowedSorts(['status_translated', 'title_translated', 'published_at'])
            ->allowedFilters([
                AllowedFilter::custom('title', new FilterOr()),
            ])
            ->allowedIncludes(['image'])
            ->paginate($request->input('per_page'));

        return $data;
    }

    protected function updatePartial(Article $article, Request $request)
    {
        foreach ($request->only('status') as $key => $content) {
            if ($article->isTranslatableAttribute($key)) {
                foreach ($content as $lang => $value) {
                    $article->setTranslation($key, $lang, $value);
                }
            } else {
                $article->{$key} = $content;
            }
        }

        $article->save();
    }

    public function destroy(Article $article)
    {
        $article->delete();
    }
}
