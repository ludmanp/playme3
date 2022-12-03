<?php

namespace TypiCMS\Modules\Articles\Http\Controllers;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\View\View;
use TypiCMS\Modules\Articles\Facades\Articles;
use TypiCMS\Modules\Core\Http\Controllers\BasePublicController;
use TypiCMS\Modules\Articles\Models\Article;
use TypiCMS\Modules\Core\Models\Tag;

class PublicController extends BasePublicController
{
    public function index(): View
    {
        $models = $this->prepareQuery()->paginate(6)
            ->withQueryString()->withPath(route(config('app.locale') . '::articles-page'));

        $tags = Tag::query()->published()->order()->get();
        $selectedTags = $this->selectedTags();

        return view('articles::public.index')
            ->with(compact('models', 'tags', 'selectedTags'));
    }

    public function page()
    {
        $models = $this->prepareQuery()->paginate(6)
            ->withQueryString()->withPath(route(config('app.locale') . '::articles-page'));

        return response(view('articles::public._list')
            ->with(['items' => $models])->render())
            ->header('X-NextPageUrl', $models->nextPageUrl())
            ->header('X-Current-Page', $models->currentPage())
            ->header('X-Last-Page', $models->lastPage())
            ;
    }

    public function show($slug): View
    {
        $model = Article::published()->whereSlugIs($slug)->firstOrFail();

        $tags = Tag::query()->published()->order()->get();
        $selectedTags = $this->selectedTags();

        return view('articles::public.show')
            ->with(compact('model', 'tags', 'selectedTags'));
    }

    private function prepareQuery(): Builder
    {
        $query = Article::published()->order()->with(['image', 'tags', 'author']);

        $requestQuery = request()->query();
        if(!empty($requestQuery['tag'])) {
            if(is_array($requestQuery['tag'])) {
                foreach ($requestQuery['tag'] as $tag) {
                    $query->whereHas('tags', function($q) use ($tag) {
                        $q->whereSlugIs($tag);
                    });
                }
            } else {
                $query->whereHas('tags', function ($q) use ($requestQuery) {
                    $q->whereSlugIs($requestQuery['tag']);
                });
            }
        }

        return $query;
    }

    private function selectedTags(): array
    {
        $selectedTags = request()->query('tag') ?? [];
        if(!is_array($selectedTags)) {
            $selectedTags = [$selectedTags];
        }
        return $selectedTags;
    }
}
