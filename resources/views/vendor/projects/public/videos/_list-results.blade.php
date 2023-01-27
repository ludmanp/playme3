<ul class="project-video-list-results-list">
    @foreach ($items as $video)
    <li class="project-video-list-results-item">
        <a class="project-video-list-results-item-link" href="{{ $video->uri() }}" title="{{ $video->title }}">
            <span class="project-video-list-results-item-title">{{ $video->title }}</span>
        </a>
    </li>
    @endforeach
</ul>
