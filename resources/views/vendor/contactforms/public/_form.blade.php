<form class='@if($full??false) contactsForm__form @else contactsBlock__form @endif' action='{{ route(config('app.locale') . '::contact-form') }}' method="post">
    @csrf()
    @if($title ?? false)
        <h3 class="contactsBlock__formHeader">{{ $title }}</h3>
    @endif
    @if($subtitle ?? false)
        <p class='contactsBlock__formDescription'>{{ $subtitle }}</p>
    @endif
    @if($full ?? false)
        <div class='contactsForm__formInfo'>
            <div class='contactsForm__formInfoRow'>
                <x-icons.location></x-icons.location>
                <span>@lang('Contact address')</span>
            </div>
            <div class='contactsForm__formInfoRow'>
                <x-icons.email></x-icons.email>
                <x-common.link :href="'mailto:' . config('typicms.webmaster_email')">
                    {{ config('typicms.webmaster_email') }}
                </x-common.link>
            </div>
            <div class='contactsForm__formInfoRow'>
                <x-icons.phone></x-icons.phone>
                <x-common.link href="'tel:' . config('typicms.contact_phone')">
                    {{ config('typicms.contact_phone') }}
                </x-common.link>
            </div>
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(session()->get('success'))
        <div class="info">
            {{ session()->get('success') }}
        </div>
    @endif

    <x-common.input :placeholder="__('Name')" type='text' name="name" :value="old('name')" required></x-common.input>
    <x-common.input :placeholder="__('Email')" type='email' name="email" :value="old('email')" required></x-common.input>
    <x-common.input :placeholder="__('Phone')" type='tel' name="phone" :value="old('phone')" required></x-common.input>
    <x-common.textarea :placeholder="__('Phone')" name="message" required>{{ old('message') }}</x-common.textarea>
    @php
        $privacyPage = Pages::find(5);
    @endphp
    <div class='contactsBlock__checkbox'>
        <x-common.checkbox name="agree_privacy_policy" :with-old="true">
            <x-slot name="checkboxText">
                @lang('I agree with :privacy_policy', ['privacy_policy' => '<a href=":href" class="link link_inlineText" inlinetext="inlineText"><span class="link__label">' . __('privacy policy link') . '</span></a>'])
            </x-slot>
        </x-common.checkbox>
    </div>
    <div class='contactsBlock__formAction'>
        <x-common.button type='submit' :withImage="true" :uppercase="true">
            <x-slot name="icon">
                <x-icons.running></x-icons.running>
            </x-slot>
            @lang('send')
        </x-common.button>
    </div>
</form>
