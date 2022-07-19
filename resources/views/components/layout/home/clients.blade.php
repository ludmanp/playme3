<div class='cliensBlock'>
    <x-common.container>
        <x-common.contentBlock>
            <x-slot name="header">
                <h3>Клиенты</h3>
            </x-slot>
        </x-common.contentBlock>
        <x-layout.home.clientsCarousel :clients="[['href'=> '#', 'image'=> '../img/home/clients/coaom.svg', 'imageAlt'=> 'coaom-img'],
               ['href'=> '#', 'image'=> '../img/home/clients/ac.svg', 'imageAlt'=> 'ac-img'],
               ['href'=> '#', 'image'=> '../img/home/clients/am.svg', 'imageAlt'=> 'am-img'],
               ['href'=> '#', 'image'=> '../img/home/clients/mth.svg', 'imageAlt'=> 'mth-img'],
               ['href'=> '#', 'image'=> '../img/home/clients/m.svg', 'imageAlt'=> 'm-img'],
               ['href'=> '#', 'image'=> '../img/home/clients/rtv.svg', 'imageAlt'=> 'rtv-img'],
               ['href'=> '#', 'image'=> '../img/home/clients/ksc.svg', 'imageAlt'=> 'ksc-img'],
               ['href'=> '#', 'image'=> '../img/home/clients/imf.svg', 'imageAlt'=> 'imf-img'],
               ['href'=> '#', 'image'=> '../img/home/clients/w.svg', 'imageAlt'=> 'w-img'],
               ]">
        </x-layout.home.clientsCarousel>
    </x-common.container>
</div>
