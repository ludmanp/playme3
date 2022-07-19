<div class='partnersBlock'>
    <x-common.container>
        <x-common.contentBlock>
            <x-slot name="header">
                <h3>Партнеры</h3>
            </x-slot>
        </x-common.contentBlock>
        <x-layout.home.partnersCarousel :partners="[['href'=> '#', 'image'=> '../img/home/partners/sh.svg', 'imageAlt'=> 'sh-img'],
               ['href'=> '#', 'image'=> '../img/home/partners/p.svg', 'imageAlt'=> 'p-img'],
               ['href'=> '#', 'image'=> '../img/home/partners/r.svg', 'imageAlt'=> 'r-img'],
               ]">
        </x-layout.home.partnersCarousel>
    </x-common.container>
</div>
