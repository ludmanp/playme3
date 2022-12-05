{{--
<script type="application/ld+json">
{
    "@context": "http://schema.org",
    "@type": "",
    "name": "{{ $fact->title }}",
    "description": "{{ $fact->summary !== '' ? $fact->summary : strip_tags($fact->body) }}",
    "image": [
        "{{ $fact->present()->image() }}"
    ],
    "mainEntityOfPage": {
        "@type": "WebPage",
        "@id": "{{ $fact->uri() }}"
    }
}
</script>
--}}
