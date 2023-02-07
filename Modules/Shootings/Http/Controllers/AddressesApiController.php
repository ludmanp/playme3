<?php

namespace TypiCMS\Modules\Shootings\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;
use TypiCMS\Modules\Core\Filters\FilterOr;
use TypiCMS\Modules\Core\Http\Controllers\BaseApiController;
use TypiCMS\Modules\Shootings\Models\ShootingAddress;
use TypiCMS\Modules\Shootings\Models\Shooting;


class AddressesApiController extends BaseApiController
{
    public function index(Shooting $shooting, Request $request): LengthAwarePaginator
    {
        $data = QueryBuilder::for(ShootingAddress::class)
            ->selectFields($request->input('fields.shooting_addresses'))
            ->allowedSorts(['address', 'position'])
            ->allowedFilters([
                AllowedFilter::custom('title', new FilterOr()),
            ])
            ->where('shooting_id', $shooting->id)
            ->paginate($request->input('per_page'));

        return $data;
    }

    protected function updatePartial(Shooting $shooting, ShootingAddress $address, Request $request)
    {
        foreach ($request->only(['status', 'position']) as $key => $content) {
            if (method_exists($address, 'isTranslatableAttribute') && $address->isTranslatableAttribute($key)) {
                foreach ($content as $lang => $value) {
                    $address->setTranslation($key, $lang, $value);
                }
            } else {
                $address->{$key} = $content;
            }
        }

        $address->save();
    }

    public function destroy(Shooting $shooting, ShootingAddress $address)
    {
        $address->delete();
    }
}
