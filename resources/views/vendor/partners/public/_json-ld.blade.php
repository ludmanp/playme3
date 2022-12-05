{{--
<script type="application/ld+json">
{
    "@context": "http://schema.org",
    "@type": "",
    "name": "{{ $partner->title }}",
    "description": "{{ $partner->summary !== '' ? $partner->summary : strip_tags($partner->body) }}",
    "image": [
        "{{ $partner->present()->image() }}"
    ],
    "mainEntityOfPage": {
        "@type": "WebPage",
        "@id": "{{ $partner->uri() }}"
    }
}
</script>
--}}
