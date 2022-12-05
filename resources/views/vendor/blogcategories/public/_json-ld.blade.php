{{--
<script type="application/ld+json">
{
    "@context": "http://schema.org",
    "@type": "",
    "name": "{{ $blogcategory->title }}",
    "description": "{{ $blogcategory->summary !== '' ? $blogcategory->summary : strip_tags($blogcategory->body) }}",
    "image": [
        "{{ $blogcategory->present()->image() }}"
    ],
    "mainEntityOfPage": {
        "@type": "WebPage",
        "@id": "{{ $blogcategory->uri() }}"
    }
}
</script>
--}}
