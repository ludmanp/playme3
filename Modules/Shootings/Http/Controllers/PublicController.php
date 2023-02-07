<?php

namespace TypiCMS\Modules\Shootings\Http\Controllers;

use Illuminate\View\View;
use TypiCMS\Modules\Shootings\Http\Requests\UpdateFormRequest;
use TypiCMS\Modules\Shootings\Models\Shooting;
use TypiCMS\Modules\Shootings\Http\Requests\CreateFormRequest;
use TypiCMS\Modules\Shootings\Models\ShootingAddress;
use TypiCMS\Modules\Shootings\Models\ShootingDate;
use TypiCMS\Modules\Core\Http\Controllers\BasePublicController;

class PublicController extends BasePublicController
{
    public function create(): View
    {
        return view('shootings::public.create');
    }

    public function store(CreateFormRequest $request): array
    {
        /** @var Shooting $shooting */
        $shooting = Shooting::create($request->validated());
        $this->saveDetails($shooting, $request);

        return [
            'success' => true,
            'shooting' => [
                'id' => $shooting->id,
                'external_id' => $shooting->external_id
            ]
        ];
    }

    public function edit(string $slug): View
    {
        $model = Shooting::query()->whereSlugIs($slug)->authorised()->firstOrFail();

        return view('shootings::public.edit')
            ->with(compact('model'));
    }

    public function update(string $slug, UpdateFormRequest $request): array
    {
        /** @var Shooting $shooting */
        $shooting = Shooting::query()->whereSlugIs($slug)->authorised()->firstOrFail();
        $shooting->update($request->validated());
        return [
            'success' => true,
        ];
    }

    private function saveDetails(Shooting $shooting, CreateFormRequest $request)
    {
        $shooting->addresses()->delete();
        $shooting->dates()->delete();
        foreach ($request->get('addresses', []) as $address) {
            if(!$address['address']) {
                continue;
            }
            $shooting->addresses()->save(new ShootingAddress(['address' => $address['address']]));
        }
        foreach ($request->get('dates', []) as $date) {
            if(!$date['date']) {
                continue;
            }
            $shooting->dates()->save(
                new ShootingDate([
                    'date' => $date['date'],
                ])
            );
        }
    }
}
