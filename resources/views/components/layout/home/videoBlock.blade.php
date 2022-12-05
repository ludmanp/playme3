<div class='videoBlock'>
    <x-common.container :fullWidth="true">
        <div class='videoBlock__content'>
            <div class='videoBlock__info'>
                <h1>{{ $title }}</h1>
                <div class='videoBlock__infoDescription'>
                    <x-common.contentBlock :thin="true">
                        <x-slot name="header">
                            <h2>{{ $subtitle }}</h2>
                        </x-slot>
                        <x-slot name="content">
                            <p>{{ $headerText }}</p>
                        </x-slot>
                        <x-slot name="actions">
                            <x-common.link :withImage="true" :uppercase="true">
                                <x-slot name="icon">
                                    <x-icons.running></x-icons.running>
                                </x-slot>
                                @lang('Связаться')
                            </x-common.link>
                        </x-slot>
                    </x-common.contentBlock>
                </div>
            </div>
            <div class='videoBlock__image'>
                <img src='{{ asset('../img/home/videoBlock.png') }}' alt='video'>
            </div>
            <div class='videoBlock__image_tablet'>
                <img src='{{ asset('../img/home/videoBlock_tablet.png') }}' alt='video'>
            </div>
        </div>
        <button class='videoBlock__button'>
            <div class='circle__outer'>
                <div class='circle__middle'>
                    <div class='circle__inner'>
                    </div>
                </div>
            </div>
            <div class='circle__icon'>
                <x-icons.play></x-icons.play>
            </div>
        </button>
    </x-common.container>
</div>
<div class='videoBlock__action_mob'>
    <x-common.link :withImage="true" :uppercase="true">
        <x-slot name="icon">
            <x-icons.running></x-icons.running>
        </x-slot>
        Связаться
    </x-common.link>
</div>
