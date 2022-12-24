{{--
<script type="application/ld+json">
{
    "@context": "http://schema.org",
    "@type": "",
    "name": "{{ $address->title }}",
    "description": "{{ $address->summary !== '' ? $address->summary : strip_tags($address->body) }}",
    "image": [
        "{{ $address->present()->image() }}"
    ],
    "mainEntityOfPage": {
        "@type": "WebPage",
        "@id": "{{ $address->uri() }}"
    }
}
</script>
--}}
