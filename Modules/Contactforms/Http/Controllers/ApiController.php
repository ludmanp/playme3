<?php

namespace TypiCMS\Modules\Contactforms\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;
use TypiCMS\Modules\Core\Filters\FilterOr;
use TypiCMS\Modules\Core\Http\Controllers\BaseApiController;
use TypiCMS\Modules\Contactforms\Models\Contactform;

class ApiController extends BaseApiController
{
    public function index(Request $request): LengthAwarePaginator
    {
        $data = QueryBuilder::for(Contactform::class)
            ->selectFields($request->input('fields.contactforms'))
            ->allowedSorts(['name', 'created_at'])
            ->allowedFilters([
                AllowedFilter::custom('name,phone,email', new FilterOr()),
            ])
            ->paginate($request->input('per_page'));

        return $data;
    }

    protected function updatePartial(Contactform $contactform, Request $request)
    {
        foreach ($request->only('status') as $key => $content) {
            if ($contactform->isTranslatableAttribute($key)) {
                foreach ($content as $lang => $value) {
                    $contactform->setTranslation($key, $lang, $value);
                }
            } else {
                $contactform->{$key} = $content;
            }
        }

        $contactform->save();
    }

    public function destroy(Contactform $contactform)
    {
        $contactform->delete();
    }
}
