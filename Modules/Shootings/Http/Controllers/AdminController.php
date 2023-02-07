<?php

namespace TypiCMS\Modules\Shootings\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Maatwebsite\Excel\Facades\Excel;
use TypiCMS\Modules\Core\Http\Controllers\BaseAdminController;
use TypiCMS\Modules\Shootings\Exports\Export;
use TypiCMS\Modules\Shootings\Http\Requests\FormRequest;
use TypiCMS\Modules\Shootings\Models\Shooting;

class AdminController extends BaseAdminController
{
    public function index(): View
    {
        return view('shootings::admin.index');
    }

    public function export(Request $request)
    {
        $filename = date('Y-m-d').' '.config('app.name').' shootings.xlsx';

        return Excel::download(new Export(), $filename);
    }

    public function create(): View
    {
        $model = new Shooting();

        return view('shootings::admin.create')
            ->with(compact('model'));
    }

    public function edit(shooting $shooting): View
    {
        return view('shootings::admin.edit')
            ->with(['model' => $shooting]);
    }

    public function store(FormRequest $request): RedirectResponse
    {
        $shooting = Shooting::create($request->validated());

        return $this->redirect($request, $shooting)
            ->withMessage(__('Item successfully created.'));
    }

    public function update(Shooting $shooting, FormRequest $request): RedirectResponse
    {
        $shooting->update($request->validated());

        return $this->redirect($request, $shooting)
            ->withMessage(__('Item successfully updated.'));
    }
}
