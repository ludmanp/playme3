<?php

namespace TypiCMS\Modules\Projects\Http\Controllers;

use Illuminate\View\View;
use TypiCMS\Modules\Core\Http\Controllers\BasePublicController;
use TypiCMS\Modules\Projects\Models\ProjectVideo;
use TypiCMS\Modules\Projects\Models\Project;

class VideosPublicController extends BasePublicController
{
    public function show($slug, $videoSlug): View
    {
        $project = Project::published()->whereSlugIs($slug)->firstOrFail();
        $model = ProjectVideo::published()->whereSlugIs($videoSlug)->where('project_id', $project->id)->firstOrFail();

        return view('projects::public.videos.show')
            ->with(compact('model'));
    }
}
