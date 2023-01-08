{{--
<script type="application/ld+json">
{
    "@context": "http://schema.org",
    "@type": "",
    "name": "{{ $date->title }}",
    "description": "{{ $date->summary !== '' ? $date->summary : strip_tags($date->body) }}",
    "image": [
        "{{ $date->present()->image() }}"
    ],
    "mainEntityOfPage": {
        "@type": "WebPage",
        "@id": "{{ $date->uri() }}"
    }
}
</script>
--}}
