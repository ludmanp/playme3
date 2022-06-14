<div class='videoBlock'>
    <div class='videoBlock__content'>
        <div class='videoBlock__info'>
            <h1>СОЗДАЕМ ВИДЕО</h1>
            <div class='videoBlock__infoDescription'>
                <x-common.contentBlock>
                    <x-slot name="header">
                        <h2>ДЛЯ ВАС И ВАШЕГО БИЗНЕСА</h2>
                    </x-slot>
                    <x-slot name="content">
                        <p>Любое мероприятие, которое вы устраиваете, мы готовы снимать и транслировать в интернете.
                            Любой дело, которым вы занимаетесь,
                            мы покажем в лучшем свете!
                            Наша команда — это профессионалы в производстве видеоконтента!</p>
                    </x-slot>
                    <x-slot name="actions">
                        <x-common.link :withImage="true" :uppercase="true">
                            <x-slot name="icon">
                                <x-icons.running></x-icons.running>
                            </x-slot>
                            Связаться
                        </x-common.link>
                    </x-slot>
                </x-common.contentBlock>
            </div>
        </div>
        <div class='videoBlock__image'>
            <img src='{{ asset('../img/home/videoBlock.png') }}' alt='video'>
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
</div>
