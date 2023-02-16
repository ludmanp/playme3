<?php

namespace TypiCMS\Modules\Video\Presenters;

use Bkwld\Croppa\Facades\Croppa;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

trait WithVideo
{
    public function getListThumb(){
        $src = false;
        $play = false;
        if($this->entity->image_id){
            $src = $this->image(525, 360, [],'image');
        }elseif($this->entity->video_link && $this->entity->image_preview){
            $src = Croppa::url(config('filesystems.disks.public.url').$this->entity->image_preview, 525, 360, []);
            $play = true;
        }
        if($src){
            return '<img src="'.$src.'" alt="'.$this->entity->title.'" itemprop="image" />'
                .($play ? '<span class="play fa fa-play"></span>' : '')
                ;
        }
        return '';
    }

    public function getImage($width = null, $height = null, array $options = [])
    {
        if($this->entity->image_id){
            return $this->image($width, $height, $options);
        }elseif($this->entity->video_link && $this->entity->image_preview){
            return $this->imagePreviewThumb($width, $height, $options);
        }
        return '';
    }

    public function imagePreviewThumb($width = null, $height = null, array $options = []): string
    {
        $url = $this->entity->image_preview;
        Log::debug('imagePreviewThumb: ' . $url);

        if (pathinfo($url, PATHINFO_EXTENSION) === 'svg') {
            return $url;
        }

        if (!Storage::exists($url)) {
            $url = $this->imgNotFound();
        }

        return Croppa::url(Storage::url($url), $width, $height, $options);
    }
}
