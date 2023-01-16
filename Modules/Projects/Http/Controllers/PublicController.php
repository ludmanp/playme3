<?php

namespace TypiCMS\Modules\Projects\Http\Controllers;

use Illuminate\View\View;
use TypiCMS\Modules\Clients\Models\Client;
use TypiCMS\Modules\Clients\Services\ListServices;
use TypiCMS\Modules\Core\Http\Controllers\BasePublicController;
use TypiCMS\Modules\Core\Http\Controllers\Traits\WithTags;
use TypiCMS\Modules\Core\Models\Tag;
use TypiCMS\Modules\Projects\Models\Project;

class PublicController extends BasePublicController
{
    use WithTags;

    public function index(Client $client = null, ListServices $clientsListService): View
    {
        if(!$client->id) {
            $client = null;
        }
        $models = Project::published()->order()->with('image')
            ->when($client, function($query) use($client) {
                $query->where('client_id', $client->id);
            })
            ->tagsFromRequest(request())
            ->get();
        $clients = $clientsListService->allForList();
        $tags = Tag::query()->published()->order()->get();
        $selectedTags = $this->selectedTags();

        return view('projects::public.index')
            ->with(compact('models', 'clients', 'client', 'tags', 'selectedTags'));
    }

    public function client(Client $client, ListServices $clientsListService): View
    {
        return $this->index($client, $clientsListService);
    }

    public function show($slug): View
    {
        $model = Project::published()->whereSlugIs($slug)->firstOrFail();

        return view('projects::public.show')
            ->with(compact('model'));
    }
}
