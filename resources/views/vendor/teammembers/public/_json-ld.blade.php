{{--
<script type="application/ld+json">
{
    "@context": "http://schema.org",
    "@type": "",
    "name": "{{ $teammember->title }}",
    "description": "{{ $teammember->summary !== '' ? $teammember->summary : strip_tags($teammember->body) }}",
    "image": [
        "{{ $teammember->present()->image() }}"
    ],
    "mainEntityOfPage": {
        "@type": "WebPage",
        "@id": "{{ $teammember->uri() }}"
    }
}
</script>
--}}
