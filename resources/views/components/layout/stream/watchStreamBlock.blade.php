<div class='watchStreamContainer'>
    <div class='watchStreamBlock'>
        <div class='watchStreamBlock__videoBlock'>
            <div class='watchStreamBlock__video'>
                <img src='{{ $image ?? '' }}' alt='{{ $imageAlt ?? '' }}'>
                <button class='videoBlock__button'>
                    <div class='circle__outer'>
                        <div class='circle__middle'>
                            <div class='circle__inner'>
                            </div>
                        </div>
                    </div>
                    <div class='circle__icon'>
                        <x-icons.playSmall></x-icons.playSmall>
                    </div>
                </button>
            </div>
        </div>
        <div class='watchStreamBlock__accordionBlock'>
            <details class='watchStream__accordion'>
                <summary>ВОПРОСЫ</summary>
                <div class='watchStream__accordionContent watchStream__accordionContent_large'>
                    <div class='watchStream__question'>Something small enough to escape casual notice.</div>
                    <div class='watchStream__question'>Something small enough to escape casual notice.</div>
                    <div class='watchStream__question'>Something small enough to escape casual notice.</div>
                    <div class='watchStream__question'>Something small enough to escape casual notice.</div>
                    <div class='watchStream__question'>Something small enough to escape casual notice.</div>
                    <div class='watchStream__question'>Something small enough to escape casual notice.</div>
                    <div class='watchStream__question'>Something small enough to escape casual notice.</div>
                    <div class='watchStream__question'>Something small enough to escape casual notice.</div>
                    <div class='watchStream__question'>Something small enough to escape casual notice.</div>
                    <div class='watchStream__question'>Something small enough to escape casual notice.</div>
                    <div class='watchStream__question'>Something small enough to escape casual notice.</div>
                    <div class='watchStream__question'>Something small enough to escape casual notice.</div>
                    <div class='watchStream__question'>Something small enough to escape casual notice.</div>
                    <div class='watchStream__question'>Something small enough to escape casual notice.</div>
                    <div class='watchStream__question'>Something small enough to escape casual notice.</div>
                </div>
            </details>
            <details class='watchStream__accordion'>
                <summary>ВОПРОСЫ</summary>
                <div class='watchStream__accordionContent'>

                    <x-layout.stream.watchStreamCommentary :image="'../img/commentary.jpg'" :commentary="'Something small enough to escape cas'">
                    </x-layout.stream.watchStreamCommentary>
                    <x-layout.stream.watchStreamCommentary :image="'../img/commentary.jpg'" :commentary="'Something small enough to escape cas'">
                    </x-layout.stream.watchStreamCommentary>
                    <x-layout.stream.watchStreamCommentary :user="true" :image="'../img/commentary.jpg'" :commentary="'Something small enough to escape cas'">
                    </x-layout.stream.watchStreamCommentary>  <x-layout.stream.watchStreamCommentary :image="'../img/commentary.jpg'" :commentary="'Something small enough to escape cas'">
                    </x-layout.stream.watchStreamCommentary>
                    <x-layout.stream.watchStreamCommentary :image="'../img/commentary.jpg'" :commentary="'Something small enough to escape cas'">
                    </x-layout.stream.watchStreamCommentary>
                    <x-layout.stream.watchStreamCommentary :image="'../img/commentary.jpg'" :commentary="'Something small enough to escape cas'">
                    </x-layout.stream.watchStreamCommentary>
                    <x-layout.stream.watchStreamCommentary :image="'../img/commentary.jpg'" :commentary="'Something small enough to escape cas'">
                    </x-layout.stream.watchStreamCommentary>

                </div>
                <div class='watchStream__commentaryBlock'>
                    <x-common.input :placeholder="'Введите текст'"></x-common.input>
                    <x-common.button>
                        <x-icons.commentary></x-icons.commentary>
                    </x-common.button>
                </div>
            </details>
        </div>
    </div>
    <div class='watchStream__infoBlock'>
        <div class='watchStreamBlock__videoDescription'>
            <h3 class='watchStreamBlock__descriptionHeader'>
                {{ $header ?? '' }}
            </h3>
            <p class='watchStreamBlock__description'>
                {{ $description ?? '' }}
            </p>
        </div>
        <div class='watchStream__streamTimetable'>
            <div>
                <p>Начало трансляции</p>
                <div class='watchStreamBlock__timetableCol'>
                    <x-common.input class='watchStreamBlock__date' value="01.01.2022" type="date" :placeholder="'MM/DD/YYYY'"></x-common.input>
                    <x-common.input class='watchStreamBlock__time' type="time"></x-common.input>
                </div>
            </div>
            <div>
                <p>Окончание трансляции</p>
                <div class='watchStreamBlock__timetableCol'>
                    <x-common.input class='watchStreamBlock__date' value="01.01.2022" type="date" :placeholder="'MM/DD/YYYY'"></x-common.input>
                    <x-common.input class='watchStreamBlock__time' type="time"></x-common.input>
                </div>
            </div>
        </div>
    </div>
</div>
