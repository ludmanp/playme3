{{--
<script type="application/ld+json">
{
    "@context": "http://schema.org",
    "@type": "",
    "name": "{{ $broadcast->title }}",
    "description": "{{ $broadcast->summary !== '' ? $broadcast->summary : strip_tags($broadcast->body) }}",
    "image": [
        "{{ $broadcast->present()->image() }}"
    ],
    "mainEntityOfPage": {
        "@type": "WebPage",
        "@id": "{{ $broadcast->uri() }}"
    }
}
</script>
--}}
