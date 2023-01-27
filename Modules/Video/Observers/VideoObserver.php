<?php

namespace TypiCMS\Modules\Video\Observers;

use Illuminate\Database\Eloquent\Model;
use TypiCMS\Modules\Video\Facades\Video;

class VideoObserver
{
    public function saving(Model $model)
    {
        if($model->isDirty('video_link')){
            if($model->video_link && $url = Video::getThumb($model->video_link)) {
                $ext = pathinfo($url, PATHINFO_EXTENSION);
                $file_name = uniqid() . '.' . $ext;
                $destination = config('filesystems.disks.public.root') . '/video_thumbs/' . $file_name;
                copy($url, $destination);
                $model->image_preview = '/video_thumbs/' . $file_name;
            }else{
                $model->image_preview = '';
            }
        }
    }
}
