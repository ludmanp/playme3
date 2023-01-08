<?php

namespace TypiCMS\Modules\Projects\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Maatwebsite\Excel\Facades\Excel;
use TypiCMS\Modules\Core\Http\Controllers\BaseAdminController;
use TypiCMS\Modules\Projects\Exports\Export;
use TypiCMS\Modules\Projects\Http\Requests\FormRequest;
use TypiCMS\Modules\Projects\Models\Project;

class AdminController extends BaseAdminController
{
    public function index(): View
    {
        return view('projects::admin.index');
    }

    public function export(Request $request)
    {
        $filename = date('Y-m-d').' '.config('app.name').' projects.xlsx';

        return Excel::download(new Export(), $filename);
    }

    public function create(): View
    {
        $model = new Project();

        return view('projects::admin.create')
            ->with(compact('model'));
    }

    public function edit(project $project): View
    {
        return view('projects::admin.edit')
            ->with(['model' => $project]);
    }

    public function store(FormRequest $request): RedirectResponse
    {
        $project = Project::create($request->validated());
        $project->team_members()->sync($request->get('team_members'));

        return $this->redirect($request, $project)
            ->withMessage(__('Item successfully created.'));
    }

    public function update(project $project, FormRequest $request): RedirectResponse
    {
        $project->update($request->validated());
        $project->team_members()->sync($request->get('team_members'));

        return $this->redirect($request, $project)
            ->withMessage(__('Item successfully updated.'));
    }
}
