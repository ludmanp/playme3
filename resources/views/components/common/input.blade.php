<div class="inputField{{
        useModifiers('inputField', [
            'column'=>$column??false,
            'location'=>$location??false,
            'date'=>$date??false,
            'time'=>$time??false,
            'error'=>$error??false,
            ])
        }} {{$attributes['class']}}" {{$attributes->except(['class'])}}>
    @if ($label ?? '')
        <label for='{{ $labelFor ?? '' }}' class='inputField__label {{ !empty($labelBig) ? 'inputField__label_big' : '' }}' for='{{ $attributes['id'] }}'>{{ $label }}</label>
    @endif
    <input id='{{ $labelFor ?? '' }}' placeholder='{{ $placeholder ?? 'placeholder' }}' value='{{ $attributes['value'] }}'  type='{{ $attributes['type'] }}'>
</div>
