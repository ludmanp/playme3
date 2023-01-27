<ul class="project-video-list-list">
    @foreach ($items as $video)
    @include('projects::public.videos._list-item')
    @endforeach
</ul>
