{{--
<script type="application/ld+json">
{
    "@context": "http://schema.org",
    "@type": "",
    "name": "{{ $social->title }}",
    "description": "{{ $social->summary !== '' ? $social->summary : strip_tags($social->body) }}",
    "image": [
        "{{ $social->present()->image() }}"
    ],
    "mainEntityOfPage": {
        "@type": "WebPage",
        "@id": "{{ $social->uri() }}"
    }
}
</script>
--}}
