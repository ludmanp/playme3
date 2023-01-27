{{--
<script type="application/ld+json">
{
    "@context": "http://schema.org",
    "@type": "",
    "name": "{{ $video->title }}",
    "description": "{{ $video->summary !== '' ? $video->summary : strip_tags($video->body) }}",
    "image": [
        "{{ $video->present()->image() }}"
    ],
    "mainEntityOfPage": {
        "@type": "WebPage",
        "@id": "{{ $video->uri() }}"
    }
}
</script>
--}}
