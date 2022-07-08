<div class='blogArticleHeader'>
    <div class='blogArticleHeader__infoBlocks'>
        <div class='blogArticleHeader__tags'>
            {{ $tags ?? '' }}
        </div>
        <div class='blogArticleHeader__info'>
            <div class='blog__author'>
                <div class='blog__authorImage'>
                    <img src='{{ $authorImage ?? '' }}' alt='{{ $authorImageAlt ?? '' }}'>
                </div>
                <span class='blog__authorName'>{{ $author ?? '' }}</span>
            </div>
            <div class='blog__date'>{{ $date ?? '' }}</div>
        </div>
    </div>
    @if ($location ?? '')
        <div class='blogArticleHeader__location'>
            <x-icons.location></x-icons.location>
            {{ $location }}
        </div>
    @endif
    <div class='blogArticleHeader__header'>
        <h3>{{ $header ?? '' }}</h3>
    </div>
</div>
