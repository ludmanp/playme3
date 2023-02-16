<?php

namespace TypiCMS\Modules\Projects\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use TypiCMS\Modules\Core\Http\Controllers\BaseAdminController;
use TypiCMS\Modules\Projects\Http\Requests\VideoFormRequest;
use TypiCMS\Modules\Projects\Models\Project;
use TypiCMS\Modules\Projects\Models\ProjectVideo;

class VideosAdminController extends BaseAdminController
{
    public function create(Project $project): View
    {
        $model = new ProjectVideo();

        return view('projects::admin.videos.create')
            ->with(compact('model', 'project'));
    }

    public function edit(Project $project, ProjectVideo $video): View
    {
        return view('projects::admin.videos.edit')
            ->with(['model' => $video, 'project' => $project]);
    }

    public function store(Project $project, VideoFormRequest $request): RedirectResponse
    {
        $video = ProjectVideo::create($request->validated());

        return $this->redirect($request, $video);
    }

    public function update(Project $project, ProjectVideo $video, VideoFormRequest $request): RedirectResponse
    {
        $video->update($request->validated());

        return $this->redirect($request, $video);
    }
}
