<div class='clientGallery__block'>
    <div class="container">
        <div class="clientGallery__slider">
            <x-layout.clients.clientGalleryItem :image="'../img/clients/clientImg.jpg'" :imageAlt="'clientImg'"></x-layout.clients.clientGalleryItem>
            <x-layout.clients.clientGalleryItem :image="'../img/clients/clientImg.jpg'" :imageAlt="'clientImg'"></x-layout.clients.clientGalleryItem>
            <x-layout.clients.clientGalleryItem :image="'../img/clients/clientImg.jpg'" :imageAlt="'clientImg'"></x-layout.clients.clientGalleryItem>
            <x-layout.clients.clientGalleryItem :image="'../img/clients/clientImg.jpg'" :imageAlt="'clientImg'"></x-layout.clients.clientGalleryItem>
            <x-layout.clients.clientGalleryItem :image="'../img/clients/clientImg.jpg'" :imageAlt="'clientImg'"></x-layout.clients.clientGalleryItem>
        </div>
        <div class="clientGallery__carouselDots">
            <div class='clientGallery__carouselDot'>
                <img src='{{ asset('img/clients/clientImg.jpg') }}' alt='test'>
            </div>
            <div class='clientGallery__carouselDot'>
                <img src='{{ asset('img/clients/clientImg.jpg') }}' alt='test'>
            </div>
            <div class='clientGallery__carouselDot'>
                <img src='{{ asset('img/clients/clientImg.jpg') }}' alt='test'>
            </div>
            <div class='clientGallery__carouselDot'>
                <img src='{{ asset('img/clients/clientImg.jpg') }}' alt='test'>
            </div>
            <div class='clientGallery__carouselDot'>
                <img src='{{ asset('img/clients/clientImg.jpg') }}' alt='test'>
            </div>
        </div>
    </div>
</div>
