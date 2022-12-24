<?php

namespace TypiCMS\Modules\Broadcasts\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Maatwebsite\Excel\Facades\Excel;
use TypiCMS\Modules\Core\Http\Controllers\BaseAdminController;
use TypiCMS\Modules\Broadcasts\Exports\Export;
use TypiCMS\Modules\Broadcasts\Http\Requests\FormRequest;
use TypiCMS\Modules\Broadcasts\Models\Broadcast;

class AdminController extends BaseAdminController
{
    public function index(): View
    {
        return view('broadcasts::admin.index');
    }

    public function export(Request $request)
    {
        $filename = date('Y-m-d').' '.config('app.name').' broadcasts.xlsx';

        return Excel::download(new Export(), $filename);
    }

    public function create(): View
    {
        $model = new Broadcast();

        return view('broadcasts::admin.create')
            ->with(compact('model'));
    }

    public function edit(broadcast $broadcast): View
    {
        return view('broadcasts::admin.edit')
            ->with(['model' => $broadcast]);
    }

    public function store(FormRequest $request): RedirectResponse
    {
        $broadcast = Broadcast::create($request->validated());

        return $this->redirect($request, $broadcast)
            ->withMessage(__('Item successfully created.'));
    }

    public function update(broadcast $broadcast, FormRequest $request): RedirectResponse
    {
        $broadcast->update($request->validated());

        return $this->redirect($request, $broadcast)
            ->withMessage(__('Item successfully updated.'));
    }
}
