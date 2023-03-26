@php
$videoId = 'tgbNymZ7vqY';
if($videoLink) {
    if($tmpId = \TypiCMS\Modules\Video\Facades\Video::getId($videoLink)) {
        $videoId = $tmpId;
    }
}
@endphp
<div class="video__overlay">
    <div class="video__popupBlock">
        <div class="video__popup">
            <button class="video__close">
                <x-icons.close/>
            </button>
            <iframe class="video__popupVideo" src="https://www.youtube.com/embed/{{ $videoId }}?autoplay=1" frameborder="0" allowfullscreen>
            </iframe>
        </div>
    </div>
</div>
