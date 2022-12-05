<?php

namespace TypiCMS\Modules\Facts\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Maatwebsite\Excel\Facades\Excel;
use TypiCMS\Modules\Core\Http\Controllers\BaseAdminController;
use TypiCMS\Modules\Facts\Exports\Export;
use TypiCMS\Modules\Facts\Http\Requests\FormRequest;
use TypiCMS\Modules\Facts\Models\Fact;

class AdminController extends BaseAdminController
{
    public function index(): View
    {
        return view('facts::admin.index');
    }

    public function export(Request $request)
    {
        $filename = date('Y-m-d').' '.config('app.name').' facts.xlsx';

        return Excel::download(new Export(), $filename);
    }

    public function create(): View
    {
        $model = new Fact();

        return view('facts::admin.create')
            ->with(compact('model'));
    }

    public function edit(fact $fact): View
    {
        return view('facts::admin.edit')
            ->with(['model' => $fact]);
    }

    public function store(FormRequest $request): RedirectResponse
    {
        $fact = Fact::create($request->validated());

        return $this->redirect($request, $fact)
            ->withMessage(__('Item successfully created.'));
    }

    public function update(fact $fact, FormRequest $request): RedirectResponse
    {
        $fact->update($request->validated());

        return $this->redirect($request, $fact)
            ->withMessage(__('Item successfully updated.'));
    }
}
