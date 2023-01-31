<?php

namespace TypiCMS\Modules\Broadcasts\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;
use TypiCMS\Modules\Core\Filters\FilterOr;
use TypiCMS\Modules\Core\Http\Controllers\BaseApiController;
use TypiCMS\Modules\Broadcasts\Models\BroadcastAddress;
use TypiCMS\Modules\Broadcasts\Models\Broadcast;


class AddressesApiController extends BaseApiController
{
    public function index(Broadcast $broadcast, Request $request): LengthAwarePaginator
    {
        $data = QueryBuilder::for(BroadcastAddress::class)
            ->selectFields($request->input('fields.broadcast_addresses'))
            ->allowedSorts(['address', 'position'])
            ->allowedFilters([
                AllowedFilter::custom('title', new FilterOr()),
            ])
            ->where('broadcast_id', $broadcast->id)
            ->paginate($request->input('per_page'));

        return $data;
    }

    protected function updatePartial(Broadcast $broadcast, BroadcastAddress $address, Request $request)
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

    public function destroy(Broadcast $broadcast, BroadcastAddress $address)
    {
        $address->delete();
    }
}
