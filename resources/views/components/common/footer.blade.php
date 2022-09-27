<footer>
    <x-common.container :flex="true">
        <x-common.link :withImage="true">
            <x-slot name="icon">
                <x-icons.running></x-icons.running>
            </x-slot>
            <x-icons.logo></x-icons.logo>
        </x-common.link>
        <nav class="footer__navigation">
            {{ $menu }}
        </nav>
        <div class='footer__info'>
            <x-common.link :href="'maito:info@playme.live'">info@playme.live</x-common.link>
            <x-common.link :href="'tel:+ 79067884874'">+ 7 906-788-48-74</x-common.link>
            <div class='footer__socialNetworks'>
                {{ $socialMenu }}
            </div>
        </div>
    </x-common.container>
    <div class='footer__copyrights'>
        <x-common.container :flex="true">
            <p>© {{ date('Y') }} @lang('Company name')  @lang('All rights reserved')</p>
            {{ $legalMenu }}
        </x-common.container>
    </div>
</footer>
