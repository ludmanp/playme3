<?php

namespace TypiCMS\Modules\Broadcasts\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\View\View;
use TypiCMS\Modules\Broadcasts\Http\Requests\CreateFormRequest;
use TypiCMS\Modules\Broadcasts\Models\BroadcastAddress;
use TypiCMS\Modules\Broadcasts\Models\BroadcastDate;
use TypiCMS\Modules\Core\Http\Controllers\BasePublicController;
use TypiCMS\Modules\Broadcasts\Models\Broadcast;

class PublicController extends BasePublicController
{
    public function index(): View
    {
        $models = Broadcast::published()->order()->with('image')->get();

        return view('broadcasts::public.index')
            ->with(compact('models'));
    }

    public function show($slug): View
    {
        $model = Broadcast::published()->whereSlugIs($slug)->firstOrFail();

        return view('broadcasts::public.show')
            ->with(compact('model'));
    }

    public function create(): View
    {
        return view('broadcasts::public.create');
    }

    public function store(CreateFormRequest $request): array
    {
        /** @var Broadcast $broadcast */
        $broadcast = Broadcast::create($request->validated());
        $this->saveDetails($broadcast, $request);

        return [
            'success' => true,
            'broadcast' => [
                'id' => $broadcast->id,
                'external_id' => $broadcast->external_id
            ]
        ];
    }

    public function edit(string $slug): View
    {
        $model = Broadcast::query()->whereSlugIs($slug)->authorised()->firstOrFail();

        return view('broadcasts::public.edit')
            ->with(compact('model'));
    }

    public function update(string $slug, CreateFormRequest $request): array
    {
        /** @var Broadcast $broadcast */
        $broadcast = Broadcast::query()->whereSlugIs($slug)->authorised()->firstOrFail();
        $broadcast->update($request->validated());
        $this->saveDetails($broadcast, $request);
        return [
            'success' => true,
        ];
    }

    private function saveDetails(Broadcast $broadcast, CreateFormRequest $request) {
        $broadcast->addresses()->delete();
        $broadcast->dates()->delete();
        foreach ($request->get('addresses', []) as $address) {
            $broadcast->addresses()->save(new BroadcastAddress(['address' => $address['address']]));
        }
        foreach ($request->get('dates', []) as $date) {
            $broadcast->dates()->save(new BroadcastDate([
                'starts_at' => $date['date'] . ' ' . $date['starts_at'],
                'arrive_at' => $date['date'] . ' ' . $date['arrive_at'],
            ]));
        }
    }
}
