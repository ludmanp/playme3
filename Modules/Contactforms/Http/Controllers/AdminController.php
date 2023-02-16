<?php

namespace TypiCMS\Modules\Contactforms\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Maatwebsite\Excel\Facades\Excel;
use TypiCMS\Modules\Core\Http\Controllers\BaseAdminController;
use TypiCMS\Modules\Contactforms\Exports\Export;
use TypiCMS\Modules\Contactforms\Http\Requests\FormRequest;
use TypiCMS\Modules\Contactforms\Models\Contactform;

class AdminController extends BaseAdminController
{
    public function index(): View
    {
        return view('contactforms::admin.index');
    }

    public function export(Request $request)
    {
        $filename = date('Y-m-d').' '.config('app.name').' contactforms.xlsx';

        return Excel::download(new Export(), $filename);
    }

    public function create(): View
    {
        $model = new Contactform();

        return view('contactforms::admin.create')
            ->with(compact('model'));
    }

    public function edit(contactform $contactform): View
    {
        return view('contactforms::admin.edit')
            ->with(['model' => $contactform]);
    }

    public function store(FormRequest $request): RedirectResponse
    {
        $contactform = Contactform::create($request->validated());

        return $this->redirect($request, $contactform)
            ->withMessage(__('Item successfully created.'));
    }

    public function update(contactform $contactform, FormRequest $request): RedirectResponse
    {
        $contactform->update($request->validated());

        return $this->redirect($request, $contactform)
            ->withMessage(__('Item successfully updated.'));
    }
}
