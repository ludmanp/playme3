<div class='textareaField{{
        useModifiers('textareaField', [
            'wide'=>$wide??false,
            ])
        }} {{$attributes['class']}}" {{$attributes->except(['class'])}}'>
    @if ($label ?? '')
        <label>{{ $label }}</label>
    @endif
    <textarea placeholder='{{ $placeholder ?? 'placeholder' }}' id='{{ $labelFor ?? '' }}' name="{{ $name ?? '' }}" {{$attributes->except(['class'])}}>{{ $slot ?? '' }}</textarea>
</div>
