<?php

namespace TypiCMS\Modules\Authors\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Maatwebsite\Excel\Facades\Excel;
use TypiCMS\Modules\Core\Http\Controllers\BaseAdminController;
use TypiCMS\Modules\Authors\Exports\Export;
use TypiCMS\Modules\Authors\Http\Requests\FormRequest;
use TypiCMS\Modules\Authors\Models\Author;

class AdminController extends BaseAdminController
{
    public function index(): View
    {
        return view('authors::admin.index');
    }

    public function export(Request $request)
    {
        $filename = date('Y-m-d').' '.config('app.name').' authors.xlsx';

        return Excel::download(new Export(), $filename);
    }

    public function create(): View
    {
        $model = new Author();

        return view('authors::admin.create')
            ->with(compact('model'));
    }

    public function edit(author $author): View
    {
        return view('authors::admin.edit')
            ->with(['model' => $author]);
    }

    public function store(FormRequest $request): RedirectResponse
    {
        $author = Author::create($request->validated());

        return $this->redirect($request, $author)
            ->withMessage(__('Item successfully created.'));
    }

    public function update(author $author, FormRequest $request): RedirectResponse
    {
        $author->update($request->validated());

        return $this->redirect($request, $author)
            ->withMessage(__('Item successfully updated.'));
    }
}
