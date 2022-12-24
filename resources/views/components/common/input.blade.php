<div class="inputField{{
        useModifiers('inputField', [
            'column'=>$column??false,
            'location'=>$location??false,
            'date'=>$date??false,
            'time'=>$time??false,
            ])
        }} {{$attributes['class']}}">
    @if ($label ?? '')
        <label for='{{ $labelFor ?? '' }}' class='inputField__label {{ !empty($labelBig) ? 'inputField__label_big' : '' }}' for='{{ $attributes['id'] }}'>{{ $label }}</label>
    @endif
    <input id='{{ $labelFor ?? '' }}' name="{{ $name ?? '' }}" placeholder='{{ $placeholder ?? '' }}' value='{{ $attributes['value'] }}'  type='{{ $attributes['type'] }}' {{$attributes->except(['class'])}}>
</div>
