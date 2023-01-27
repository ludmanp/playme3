<?php

namespace TypiCMS\Modules\Projects\Presenters;

use TypiCMS\Modules\Core\Presenters\Presenter;
use TypiCMS\Modules\Projects\Models\ProjectVideo;
use TypiCMS\Modules\Video\Presenters\WithVideo;

/**
 * Class VideoModulePresenter
 *
 * @property ProjectVideo $entity
 */
class VideoModulePresenter extends Presenter
{
    use WithVideo;

    public function showData()
    {
        return [
            'link' => $this->entity->video_link,
            'image' => $this->getImage(),
            'alt' => optional($this->entity->image)->alt_attribute ?? $this->entity->title,
        ];
    }
}
