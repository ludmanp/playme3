<div class='clientGallery__block'>
    <div class="container">
        <div class="clientGallery__slider">
            @foreach(($slides ?? []) as $slide)
            <x-layout.clients.clientGalleryItem :clinetVideo="$slide['link']" :image="$slide['image']" :imageAlt="$slide['alt']"></x-layout.clients.clientGalleryItem>
            @endforeach
        </div>
        <div class="clientGallery__carouselDots">
            @foreach(($slides ?? []) as $slide)
            <div class='clientGallery__carouselDot'>
                <img src='{{ $slide['image'] }}' alt='{{ $slide['alt'] }}'>
            </div>
            @endforeach
        </div>
    </div>
</div>
