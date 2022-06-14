<footer>
    <x-common.container :flex="true">
        <x-common.link :withImage="true">
            <x-slot name="icon">
                <x-icons.running></x-icons.running>
            </x-slot>
            <x-icons.logo></x-icons.logo>
        </x-common.link>
        <nav class="footer__navigation">
            <x-common.link :href="'#'">Услуги</x-common.link>
            <x-common.link :href="'#'">Клиенты</x-common.link>
            <x-common.link :href="'#'">Команда</x-common.link>
            <x-common.link :href="'#'">Блог</x-common.link>
            <x-common.link :href="'#'">Контакты</x-common.link>
        </nav>
        <div class='footer__info'>
            <x-common.link :href="'maito:info@playme.live'">info@playme.live</x-common.link>
            <x-common.link :href="'tel:+ 79067884874'">+ 7 906-788-48-74</x-common.link>
            <div class='footer__socialNetworks'>
                <x-common.link :href="'#'">vk</x-common.link>
                <x-common.link :href="'#'">ig</x-common.link>
                <x-common.link :href="'#'">fb</x-common.link>
            </div>
        </div>
    </x-common.container>
    <div class='footer__copyrights'>
        <x-common.container :flex="true">
            <p>© 2021 ООО «???» Все права защищены</p>
            <x-common.link href="'#'">Политика конфиденциальности</x-common.link>
        </x-common.container>
    </div>
</footer>
