<?php

namespace TypiCMS\Modules\Articles\Http\Controllers;

use Illuminate\View\View;
use TypiCMS\Modules\Core\Http\Controllers\BasePublicController;
use TypiCMS\Modules\Articles\Models\Article;
use TypiCMS\Modules\Core\Http\Controllers\Traits\WithTags;
use TypiCMS\Modules\Core\Models\Tag;

class PublicController extends BasePublicController
{
    use WithTags;

    public function index(): View
    {
        $models = Article::published()->order()->with(['image', 'tags', 'author'])->tagsFromRequest(request())->paginate(6)
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

}
