<?php

namespace TypiCMS\Modules\Projects\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;
use TypiCMS\Modules\Core\Filters\FilterOr;
use TypiCMS\Modules\Core\Http\Controllers\BaseApiController;
use TypiCMS\Modules\Projects\Models\ProjectVideo;
use TypiCMS\Modules\Projects\Models\Project;


class VideosApiController extends BaseApiController
{
    public function index(Project $project, Request $request): LengthAwarePaginator
    {
        $data = QueryBuilder::for(ProjectVideo::class)
            ->selectFields($request->input('fields.project_videos'))
            ->allowedSorts(['status', 'title_translated', 'position'])
            ->allowedFilters([
                AllowedFilter::custom('title', new FilterOr()),
            ])
            ->allowedIncludes(['image'])
            ->where('project_id', $project->id)
            ->paginate($request->input('per_page'));

        return $data;
    }

    protected function updatePartial(Project $project, ProjectVideo $video, Request $request)
    {
        foreach ($request->only(['status', 'position']) as $key => $content) {
            if (method_exists($video, 'isTranslatableAttribute') && $video->isTranslatableAttribute($key)) {
                foreach ($content as $lang => $value) {
                    $video->setTranslation($key, $lang, $value);
                }
            } else {
                $video->{$key} = $content;
            }
        }

        $video->save();
    }

    public function destroy(Project $project, ProjectVideo $video)
    {
        $video->delete();
    }
}
