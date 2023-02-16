{{--
<script type="application/ld+json">
{
    "@context": "http://schema.org",
    "@type": "",
    "name": "{{ $project->title }}",
    "description": "{{ $project->summary !== '' ? $project->summary : strip_tags($project->body) }}",
    "image": [
        "{{ $project->present()->image() }}"
    ],
    "mainEntityOfPage": {
        "@type": "WebPage",
        "@id": "{{ $project->uri() }}"
    }
}
</script>
--}}
