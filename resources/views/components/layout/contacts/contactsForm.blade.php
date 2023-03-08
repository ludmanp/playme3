<div class='contactsForm__block'>
    <div class="contactsForm__header">
        <x-common.contentBlock>
            <x-slot name="header">
                <h3>@lang('Clients')</h3>
            </x-slot>
        </x-common.contentBlock>
    </div>
    <div class='contactsForm__formContainer'>
        {{ $slot ?? '' }}
    </div>
</div>
