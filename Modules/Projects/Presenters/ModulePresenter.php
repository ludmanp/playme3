<?php

namespace TypiCMS\Modules\Projects\Presenters;

use TypiCMS\Modules\Core\Presenters\Presenter;
use TypiCMS\Modules\Projects\Models\Project;
use TypiCMS\Modules\Projects\Models\ProjectVideo;

/**
 * @property Project $entity
 */
class ModulePresenter extends Presenter
{
    public function showVideoData(): array
    {
        return $this->entity->videos->map(function (ProjectVideo $video) {
            return $video->present()->showData();
        })->all();
    }
}
