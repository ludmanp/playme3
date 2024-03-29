<?php

namespace TypiCMS\Modules\Projects\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;
use TypiCMS\Modules\Core\Filters\FilterOr;
use TypiCMS\Modules\Core\Http\Controllers\BaseApiController;
use TypiCMS\Modules\Projects\Models\Project;

class ApiController extends BaseApiController
{
    public function index(Request $request): LengthAwarePaginator
    {
        $data = QueryBuilder::for(Project::class)
            ->selectFields($request->input('fields.projects'))
            ->allowedSorts(['status_translated', 'title_translated'])
            ->allowedFilters([
                AllowedFilter::custom('title', new FilterOr()),
            ])
            ->allowedIncludes(['image'])
            ->paginate($request->input('per_page'));

        return $data;
    }

    protected function updatePartial(Project $project, Request $request)
    {
        foreach ($request->only('status') as $key => $content) {
            if ($project->isTranslatableAttribute($key)) {
                foreach ($content as $lang => $value) {
                    $project->setTranslation($key, $lang, $value);
                }
            } else {
                $project->{$key} = $content;
            }
        }

        $project->save();
    }

    public function destroy(Project $project)
    {
        $project->delete();
    }
}
