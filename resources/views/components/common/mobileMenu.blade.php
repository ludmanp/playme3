<div class='mobileMenu'>
    <x-common.container>
        <div class='mobileMenu__actions'>
            <div class='mobileMenu__header'>
                <x-icons.running></x-icons.running>
                <x-common.button :withImage="true">
                    <x-icons.close></x-icons.close>
                </x-common.button>
            </div>
            <div class='mobileMenu__modalBtn'>
                <x-common.link data-a11y-dialog-show="loginModal" :withImageAfter="true" :href="'#'">
                    Личный кабинет
                    <x-slot name="iconAfter">
                        <x-icons.login></x-icons.login>
                    </x-slot>
                </x-common.link>
            </div>
            <div class='mobileMenu__navigation'>
                <nav>
                    {{ $slot }}
                </nav>
            </div>
        </div>
        <div class='mobileMenu__footer'>
           <div class='mobileMenu__contacts'>
               <x-common.link :href="'maito:info@playme.live'">info@playme.live</x-common.link>
               <x-common.link :href="'tel:+ 79067884874'">+ 7 906-788-48-74</x-common.link>
           </div>
            <div class='mobileMenu__socialNetworks'>
                <x-common.link :href="'#'">vk</x-common.link>
                <x-common.link :href="'#'">ig</x-common.link>
                <x-common.link :href="'#'">fb</x-common.link>
            </div>
        </div>
    </x-common.container>
</div>
