<?php

namespace TypiCMS\Modules\Pageoptions\Http\Controllers;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;
use TypiCMS\Modules\Core\Filters\FilterOr;
use TypiCMS\Modules\Core\Http\Controllers\BaseApiController;
use TypiCMS\Modules\Files\Models\File;
use TypiCMS\Modules\Pageoptions\Models\Pageoption;

class ApiController extends BaseApiController
{
    public function index(Request $request): LengthAwarePaginator
    {
        $data = QueryBuilder::for(Pageoption::class)
            ->selectFields($request->input('fields.pageoptions'))
            ->allowedSorts(['status_translated', 'title_translated'])
            ->allowedFilters([
                AllowedFilter::custom('title', new FilterOr()),
            ])
            ->allowedIncludes(['image'])
            ->paginate($request->input('per_page'));

        return $data;
    }

    protected function updatePartial(Pageoption $pageoption, Request $request): JsonResponse
    {
        $data = [];
        foreach ($request->all() as $column => $content) {
            if (is_array($content)) {
                foreach ($content as $key => $value) {
                    $data[$column.'->'.$key] = $value;
                }
            } else {
                $data[$column] = $content;
            }
        }

        foreach ($data as $key => $value) {
            $pageoption->$key = $value;
        }
        $saved = $pageoption->save();

        return response()->json([
            'error' => !$saved,
        ]);
    }

    public function destroy(Pageoption $pageoption): JsonResponse
    {
        $deleted = $pageoption->delete();

        return response()->json([
            'error' => !$deleted,
        ]);
    }

    public function files(Pageoption $pageoption): Collection
    {
        return $pageoption->files;
    }

    public function attachFiles(Pageoption $pageoption, Request $request): JsonResponse
    {
        return $pageoption->attachFiles($request);
    }

    public function detachFile(Pageoption $pageoption, File $file): void
    {
        $pageoption->detachFile($file);
    }
}
