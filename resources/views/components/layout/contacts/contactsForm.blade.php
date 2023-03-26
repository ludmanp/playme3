<div class='contactsForm__block'>
    <div class="contactsForm__header">
        @if($title ?? false)
        <x-common.contentBlock>
            <x-slot name="header">
                <h3>{{ $title }}</h3>
            </x-slot>
        </x-common.contentBlock>
        @endif
    </div>
    <div class='contactsForm__formContainer'>
        {{ $slot ?? '' }}
    </div>
</div>
