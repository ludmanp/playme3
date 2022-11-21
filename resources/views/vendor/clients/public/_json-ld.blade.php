{{--
<script type="application/ld+json">
{
    "@context": "http://schema.org",
    "@type": "",
    "name": "{{ $client->title }}",
    "description": "{{ $client->summary !== '' ? $client->summary : strip_tags($client->body) }}",
    "image": [
        "{{ $client->present()->image() }}"
    ],
    "mainEntityOfPage": {
        "@type": "WebPage",
        "@id": "{{ $client->uri() }}"
    }
}
</script>
--}}
