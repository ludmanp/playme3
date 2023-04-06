<?php

namespace TypiCMS\Modules\Video\Services;


class VideoService
{
    public function getThumb($link){
        switch ($this->detectType($link)){
            case 'vimeo':
                return $this->getVimeoThumb($this->VimeoId($link));
            case 'youtube':
                return $this->getYoutubeThumb($this->YoutubeId($link));

        }
        return '';
    }

    public function getId($link): string
    {
        switch ($this->detectType($link)){
            case 'vimeo':
                return $this->VimeoId($link);
            case 'youtube':
                return $this->YoutubeId($link);

        }
        return '';
    }

    public function getEmbedCode($link){
        switch ($this->detectType($link)){
            case 'vimeo':
                $id = $this->VimeoId($link);
                return '<iframe class="embed-responsive-item" src="https://player.vimeo.com/video/'.$id.'" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';
            case 'youtube':
                $id = $this->YoutubeId($link);
                return '<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/'.$id.'" frameborder="0" allowfullscreen></iframe>';
        }
        return '';
    }

    private function getVimeoThumb($id){
        $json = json_decode(file_get_contents('http://vimeo.com/api/v2/video/'.$id.'.json'));
        return $json[0]->thumbnail_large ?? ($json[0]->thumbnail_medium ?? ($json[0]->thumbnail_small ?? ''));
    }

    private function getYoutubeThumb($id){
        $data = file_get_contents("https://www.googleapis.com/youtube/v3/videos?key=" . config('services.google.apy-key.youtube') . "&part=snippet&id=".$id);
        $json = json_decode($data, true);
        $width = 0;
        $image = '';
        foreach($json['items'][0]['snippet']['thumbnails'] as $key => $thumb){
            if($thumb["width"] >= $width){
                $width = $thumb["width"];
                $image = $thumb["url"];
            }
        }
        return $image;
    }

    private function detectType($link){
        $link_info = parse_url($link);
        if($link_info['host']=='vimeo.com'){
            return 'vimeo';
        }
        if(in_array($link_info['host'], ['www.youtube.com', 'youtube.com', 'youtu.be'])){
            return 'youtube';
        }
    }

    private function YoutubeId($link){
//        preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/|youtube\.com/shorts/)([^"&?/ ]{11})%i', $link, $match);
        preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $link, $match);
        return $match[1];
    }

    private function VimeoId($link){
        $link_info = parse_url($link);
        return explode('/', trim($link_info['path'], '/'))[0];
    }
}
