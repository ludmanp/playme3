<div class='blogCard'>
    <div class='blogCard__image'>
        <img src='{{ $image ?? '' }}' alt='{{ $imageAlt ?? '' }}'>
    </div>
    <div class='blogCard__content'>
        <div class='blogCard__info'>
            <div class='blog__author'>
                <div class='blog__authorImage'>
                    <img src='{{ $authorImage ?? '' }}' alt='{{ $authorImageAlt ?? '' }}'>
                </div>
                <span class='blog__authorName'>{{ $author ?? '' }}</span>
            </div>
            <div class='blog__date'>{{ $date ?? '' }}</div>
{{--            <div class='blog__arrows' data-target-carousel='{{ $carouselId ?? '' }}'>--}}
{{--                <button class='previous'>--}}
{{--                    <x-icons.arrowLeft></x-icons.arrowLeft>--}}
{{--                </button>--}}
{{--                <button class='next'>--}}
{{--                    <x-icons.arrowRight></x-icons.arrowRight>--}}
{{--                </button>--}}
{{--            </div>--}}
        </div>
        <div class='blogCard__tags' data-target-carousel='{{ $carouselId ?? '' }}'>
           {{ $tags ?? '' }}
        </div>
        <div class='blogCard__header'>
            <p>{{ $header ?? '' }}</p>
        </div>
        <div class='blogCard__text'>
            <p>{{ $text ?? '' }}</p>
        </div>
       <div class='blogCard__action'>
           {{ $action ?? '' }}
       </div>
    </div>
</div>
