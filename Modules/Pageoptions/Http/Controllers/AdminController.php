<?php

namespace TypiCMS\Modules\Pageoptions\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use TypiCMS\Modules\Core\Http\Controllers\BaseAdminController;
use TypiCMS\Modules\Pageoptions\Http\Requests\FormRequest;
use TypiCMS\Modules\Pageoptions\Models\Pageoption;

class AdminController extends BaseAdminController
{
    public function index(): View
    {
        return view('pageoptions::admin.index');
    }

    public function create(): View
    {
        $model = new Pageoption();

        return view('pageoptions::admin.create')
            ->with(compact('model'));
    }

    public function edit(Pageoption $pageoption): View
    {
        return view('pageoptions::admin.edit')
            ->with(['model' => $pageoption]);
    }

    public function store(FormRequest $request): RedirectResponse
    {
        $pageoption = Pageoption::create($request->all());

        return $this->redirect($request, $pageoption);
    }

    public function update(Pageoption $pageoption, FormRequest $request): RedirectResponse
    {
        $pageoption->update($request->all());

        return $this->redirect($request, $pageoption);
    }
}
