{{--
<script type="application/ld+json">
{
    "@context": "http://schema.org",
    "@type": "",
    "name": "{{ $article->title }}",
    "description": "{{ $article->summary !== '' ? $article->summary : strip_tags($article->body) }}",
    "image": [
        "{{ $article->present()->image() }}"
    ],
    "mainEntityOfPage": {
        "@type": "WebPage",
        "@id": "{{ $article->uri() }}"
    }
}
</script>
--}}
