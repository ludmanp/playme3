<?php

namespace TypiCMS\Modules\Articles\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Maatwebsite\Excel\Facades\Excel;
use TypiCMS\Modules\Core\Http\Controllers\BaseAdminController;
use TypiCMS\Modules\Articles\Exports\Export;
use TypiCMS\Modules\Articles\Http\Requests\FormRequest;
use TypiCMS\Modules\Articles\Models\Article;

class AdminController extends BaseAdminController
{
    public function index(): View
    {
        return view('articles::admin.index');
    }

    public function export(Request $request)
    {
        $filename = date('Y-m-d').' '.config('app.name').' articles.xlsx';

        return Excel::download(new Export(), $filename);
    }

    public function create(): View
    {
        $model = new Article();

        return view('articles::admin.create')
            ->with(compact('model'));
    }

    public function edit(article $article): View
    {
        return view('articles::admin.edit')
            ->with(['model' => $article]);
    }

    public function store(FormRequest $request): RedirectResponse
    {
        $article = Article::create($request->validated());

        return $this->redirect($request, $article)
            ->withMessage(__('Item successfully created.'));
    }

    public function update(article $article, FormRequest $request): RedirectResponse
    {
        $article->update($request->validated());

        return $this->redirect($request, $article)
            ->withMessage(__('Item successfully updated.'));
    }
}
