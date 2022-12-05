<?php

namespace TypiCMS\Modules\Blogcategories\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Maatwebsite\Excel\Facades\Excel;
use TypiCMS\Modules\Core\Http\Controllers\BaseAdminController;
use TypiCMS\Modules\Blogcategories\Exports\Export;
use TypiCMS\Modules\Blogcategories\Http\Requests\FormRequest;
use TypiCMS\Modules\Blogcategories\Models\Blogcategory;

class AdminController extends BaseAdminController
{
    public function index(): View
    {
        return view('blogcategories::admin.index');
    }

    public function export(Request $request)
    {
        $filename = date('Y-m-d').' '.config('app.name').' blogcategories.xlsx';

        return Excel::download(new Export(), $filename);
    }

    public function create(): View
    {
        $model = new Blogcategory();

        return view('blogcategories::admin.create')
            ->with(compact('model'));
    }

    public function edit(blogcategory $blogcategory): View
    {
        return view('blogcategories::admin.edit')
            ->with(['model' => $blogcategory]);
    }

    public function store(FormRequest $request): RedirectResponse
    {
        $blogcategory = Blogcategory::create($request->validated());

        return $this->redirect($request, $blogcategory)
            ->withMessage(__('Item successfully created.'));
    }

    public function update(blogcategory $blogcategory, FormRequest $request): RedirectResponse
    {
        $blogcategory->update($request->validated());

        return $this->redirect($request, $blogcategory)
            ->withMessage(__('Item successfully updated.'));
    }
}
