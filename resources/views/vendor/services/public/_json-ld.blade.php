{{--
<script type="application/ld+json">
{
    "@context": "http://schema.org",
    "@type": "",
    "name": "{{ $service->title }}",
    "description": "{{ $service->summary !== '' ? $service->summary : strip_tags($service->body) }}",
    "image": [
        "{{ $service->present()->image() }}"
    ],
    "mainEntityOfPage": {
        "@type": "WebPage",
        "@id": "{{ $service->uri() }}"
    }
}
</script>
--}}
