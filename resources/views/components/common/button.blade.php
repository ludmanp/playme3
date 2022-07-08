<button type="{{ $attributes['type'] ?? 'button' }}" class="button{{
        useModifiers('button', [
            'uppercase'=>$uppercase??false,
            'withImage'=>$withImage??false,
            ])
        }} {{$attributes['class']}}" {{$attributes->except(['class'])}}>
    @if ($icon ?? '')
        <span class="link__icon">{{$icon}}</span>
    @endif
    <span class="link__label">{{$slot}}</span>

    @if ($iconAfter ?? '')
        <span class="link__icon">{{$iconAfter}}</span>
    @endif

</button>
