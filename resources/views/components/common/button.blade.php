<button type="{{ $attributes['type'] ?? 'button' }}" class="button{{
        useModifiers('button', [
            'uppercase'=>$uppercase??false,
            'withImage'=>$withImage??false,
            'tag'=>$tag??false,
            'tagActive'=>$tagActive??false,
            'alignEnd'=>$alignEnd??false,
            'white'=>$white??false,
            'green'=>$green??false,
            ])
        }} {{$attributes['class']}}" {{$attributes->except(['class'])}}>
    @if ($icon ?? '')
        <span class="link__icon">{{$icon}}</span>
    @endif
    <span class="link__label">{{ $slot->isNotEmpty() ? $slot : '' }}</span>

    @if ($iconAfter ?? '')
        <span class="link__icon">{{$iconAfter}}</span>
    @endif

</button>
