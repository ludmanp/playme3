<?php

namespace TypiCMS\Modules\Clients\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Maatwebsite\Excel\Facades\Excel;
use TypiCMS\Modules\Core\Http\Controllers\BaseAdminController;
use TypiCMS\Modules\Clients\Exports\Export;
use TypiCMS\Modules\Clients\Http\Requests\FormRequest;
use TypiCMS\Modules\Clients\Models\Client;

class AdminController extends BaseAdminController
{
    public function index(): View
    {
        return view('clients::admin.index');
    }

    public function export(Request $request)
    {
        $filename = date('Y-m-d').' '.config('app.name').' clients.xlsx';

        return Excel::download(new Export(), $filename);
    }

    public function create(): View
    {
        $model = new Client();

        return view('clients::admin.create')
            ->with(compact('model'));
    }

    public function edit(client $client): View
    {
        return view('clients::admin.edit')
            ->with(['model' => $client]);
    }

    public function store(FormRequest $request): RedirectResponse
    {
        $client = Client::create($request->validated());

        return $this->redirect($request, $client)
            ->withMessage(__('Item successfully created.'));
    }

    public function update(client $client, FormRequest $request): RedirectResponse
    {
        $client->update($request->validated());

        return $this->redirect($request, $client)
            ->withMessage(__('Item successfully updated.'));
    }
}
