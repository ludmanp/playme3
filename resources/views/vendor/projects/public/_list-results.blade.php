<ul class="project-list-results-list">
    @foreach ($items as $project)
    <li class="project-list-results-item">
        <a class="project-list-results-item-link" href="{{ $project->uri() }}" title="{{ $project->title }}">
            <span class="project-list-results-item-title">{{ $project->title }}</span>
        </a>
    </li>
    @endforeach
</ul>
