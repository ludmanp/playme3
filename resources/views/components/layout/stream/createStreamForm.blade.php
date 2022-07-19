<form action='' class='createStreamForm'>
    <div class='createStreamForm__col'>
        <x-common.textarea :label="'Название'" :placeholder="'Название трансляции'"></x-common.textarea>
        <x-common.textarea :wide="true" :label="'описание'" :placeholder="'описание'"></x-common.textarea>
        <div class='createStreamForm__timetable'>
            <div class='createStreamForm__timetableBlock'>
                <p>Начало трансляции</p>
                <div class='createStreamForm__timetableCol'>
                    <x-common.input class='createStreamForm__date' value="01.01.2022" type="date" :placeholder="'MM/DD/YYYY'"></x-common.input>
                    <x-common.input class='createStreamForm__time' type="time"></x-common.input>
                </div>
            </div>
            <div class='createStreamForm__timetableBlock'>
                <p>Окончание трансляции</p>
                <div class='createStreamForm__timetableCol'>
                    <x-common.input class='createStreamForm__date' value="01.01.2022" type="date" :placeholder="'MM/DD/YYYY'"></x-common.input>
                    <x-common.input class='createStreamForm__time' type="time"></x-common.input>
                </div>
            </div>
        </div>
    </div>
    <div class='createStreamForm__col'>
        <div>
            <div class='createStreamForm__preview'>
                <x-common.input :label="'загрузить превью'" :labelFor="'createStreamForm__file'" class='createStreamForm__file' type="file" :placeholder="'MM/DD/YYYY'"></x-common.input>
            </div>
            <div class='createStreamForm__checkboxes'>
                <x-common.checkbox :greenText="true">
                    <x-slot name="checkboxText">
                        Доспупно всем зрителям
                    </x-slot>
                </x-common.checkbox>
                <x-common.checkbox :greenText="true">
                    <x-slot name="checkboxText">
                        Доступ по паролю
                    </x-slot>
                </x-common.checkbox>
                <x-common.checkbox :greenText="true">
                    <x-slot name="checkboxText">
                        Чат с вопросами
                    </x-slot>
                </x-common.checkbox>
                <x-common.checkbox :greenText="true">
                    <x-slot name="checkboxText">
                        Чат с комментариями
                    </x-slot>
                </x-common.checkbox>
            </div>
        </div>
    </div>
    <div class='createStreamForm__col'>
        <div class='createStreamForm__action'>
            <x-common.button type='submit' :withImage="true" :uppercase="true">
                <x-slot name="icon">
                    <x-icons.running></x-icons.running>
                </x-slot>
                создать трансляцию
            </x-common.button>
        </div>
    </div>
</form>
