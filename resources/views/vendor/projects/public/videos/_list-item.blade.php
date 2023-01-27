<li class="project-video-list-item">
    <a class="project-video-list-item-link" href="{{ $video->uri() }}" title="{{ $video->title }}">
        <div class="project-video-list-item-title">{{ $video->title }}</div>
        <div class="project-video-list-item-image-wrapper">
            @empty (!$video->image)
            <img class="project-video-list-item-image" src="{{ $video->present()->image(null, 200) }}" width="{{ $video->image->width }}" height="{{ $video->image->height }}" alt="{{ $video->image->alt_attribute }}">
            @endempty
        </div>
    </a>
</li>
