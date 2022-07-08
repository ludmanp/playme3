<div class='clientGallery__block'>
    <div class="clientGallery__carouselOuter">
        <div class='clientGallery__carousel'>
            <div id="itemMain" class="owl-carousel owl-theme">
                <x-layout.clients.clientGalleryItem :image="'../img/clients/clientImg.jpg'" :imageAlt="'clientImg'"></x-layout.clients.clientGalleryItem>
                <x-layout.clients.clientGalleryItem :image="'../img/clients/clientImg.jpg'" :imageAlt="'clientImg'"></x-layout.clients.clientGalleryItem>
                <x-layout.clients.clientGalleryItem :image="'../img/clients/clientImg.jpg'" :imageAlt="'clientImg'"></x-layout.clients.clientGalleryItem>
                <x-layout.clients.clientGalleryItem :image="'../img/clients/clientImg.jpg'" :imageAlt="'clientImg'"></x-layout.clients.clientGalleryItem>
            </div>
        </div>
        <div class='clientGallery__carouselDots' id='carousel-custom-dots'>
                <div class='owl-dot'>
                    <img src='{{ asset('img/clients/clientImg.jpg') }}' alt='test'>
                </div>
                <div class='owl-dot'>
                    <img src='{{ asset('img/clients/clientImg.jpg') }}' alt='test'>
                </div>
                <div class='owl-dot'>
                    <img src='{{ asset('img/clients/clientImg.jpg') }}' alt='test'>
                </div>
                <div class='owl-dot'>
                    <img src='{{ asset('img/clients/clientImg.jpg') }}' alt='test'>
                </div>
        </div>
    </div>
</div>
