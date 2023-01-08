<li class="project-list-item">
    <a class="project-list-item-link" href="{{ $project->uri() }}" title="{{ $project->title }}">
        <div class="project-list-item-title">{{ $project->title }}</div>
        <div class="project-list-item-image-wrapper">
            @empty (!$project->image)
            <img class="project-list-item-image" src="{{ $project->present()->image(null, 200) }}" width="{{ $project->image->width }}" height="{{ $project->image->height }}" alt="{{ $project->image->alt_attribute }}">
            @endempty
        </div>
    </a>
</li>
