<footer>
    <x-common.container :flex="true">
        <x-common.link :withImage="true" :href="TypiCMS::homeUrl()">
            <x-slot name="icon">
                <x-icons.running></x-icons.running>
            </x-slot>
            <x-icons.logo></x-icons.logo>
        </x-common.link>
        <nav class="footer__navigation">
            {{ $menu ?? '' }}
        </nav>
        <div class='footer__info'>
            <x-common.link :href="'maito:' . config('typicms.webmaster_email')">{{ config('typicms.webmaster_email') }}</x-common.link>
            <x-common.link :href="'tel:' . config('typicms.contact_phone')">{{ config('typicms.contact_phone') }}</x-common.link>
            <div class='footer__socialNetworks'>
                {{ $socialMenu ?? '' }}
            </div>
        </div>
    </x-common.container>
    <div class='footer__copyrights'>
        <x-common.container :flex="true">
            <p>© {{ date('Y') }} @lang('Company name')  @lang('All rights reserved')</p>
            {{ $legalMenu ?? '' }}
        </x-common.container>
    </div>
</footer>
