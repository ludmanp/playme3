<?php

namespace TypiCMS\Modules\Teammembers\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Maatwebsite\Excel\Facades\Excel;
use TypiCMS\Modules\Core\Http\Controllers\BaseAdminController;
use TypiCMS\Modules\Teammembers\Exports\Export;
use TypiCMS\Modules\Teammembers\Http\Requests\FormRequest;
use TypiCMS\Modules\Teammembers\Models\Teammember;

class AdminController extends BaseAdminController
{
    public function index(): View
    {
        return view('teammembers::admin.index');
    }

    public function export(Request $request)
    {
        $filename = date('Y-m-d').' '.config('app.name').' teammembers.xlsx';

        return Excel::download(new Export(), $filename);
    }

    public function create(): View
    {
        $model = new Teammember();

        return view('teammembers::admin.create')
            ->with(compact('model'));
    }

    public function edit(teammember $teammember): View
    {
        return view('teammembers::admin.edit')
            ->with(['model' => $teammember]);
    }

    public function store(FormRequest $request): RedirectResponse
    {
        $teammember = Teammember::create($request->validated());

        return $this->redirect($request, $teammember)
            ->withMessage(__('Item successfully created.'));
    }

    public function update(teammember $teammember, FormRequest $request): RedirectResponse
    {
        $teammember->update($request->validated());

        return $this->redirect($request, $teammember)
            ->withMessage(__('Item successfully updated.'));
    }
}
