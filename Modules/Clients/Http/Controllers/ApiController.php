<?php

namespace TypiCMS\Modules\Clients\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;
use TypiCMS\Modules\Core\Filters\FilterOr;
use TypiCMS\Modules\Core\Http\Controllers\BaseApiController;
use TypiCMS\Modules\Clients\Models\Client;

class ApiController extends BaseApiController
{
    public function index(Request $request): LengthAwarePaginator
    {
        $data = QueryBuilder::for(Client::class)
            ->selectFields($request->input('fields.clients'))
            ->allowedSorts(['status_translated', 'title_translated', 'position'])
            ->allowedFilters([
                AllowedFilter::custom('title', new FilterOr()),
            ])
            ->allowedIncludes(['image'])
            ->paginate($request->input('per_page'));

        return $data;
    }

    protected function updatePartial(Client $client, Request $request)
    {
        foreach ($request->only(['status', 'position']) as $key => $content) {
            if ($client->isTranslatableAttribute($key)) {
                foreach ($content as $lang => $value) {
                    $client->setTranslation($key, $lang, $value);
                }
            } else {
                $client->{$key} = $content;
            }
        }

        $client->save();
    }

    public function destroy(Client $client)
    {
        $client->delete();
    }
}
