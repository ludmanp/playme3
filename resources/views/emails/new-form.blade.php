@component('mail::message')
# @lang('New contact form')


<x-mail::table>
|           |                           |
| --------- |---------------------------|
| Name      | {{ $contactform->name }}  |
| Email     | {{ $contactform->email }} |
| Phone     | {{ $contactform->phone }} |
| Lang      | {{ $contactform->lang }}  |
</x-mail::table>

{!! nl2br(strip_tags($contactform->message)) !!}

@endcomponent
