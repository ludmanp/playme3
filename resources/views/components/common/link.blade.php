<a href="{{ $href ?? '' }}" class="link{{
        useModifiers('link', [
            'withImage'=>$withImage??false,
            'withImageAfter'=>$withImageAfter??false,
            'currentLang'=>$currentLang??false,
            'uppercase'=>$uppercase??false,
            'inlineText'=>$inlineText??false,
            'imageOnly'=>$imageOnly??false,
            'tag'=>$tag??false,
            'tagActive'=>$tagActive??false,
            'serviceTag'=>$serviceTag??false,
            'serviceTab'=>$serviceTab??false,
            'tab'=>$tab??false,
            ])
        }} {{$attributes['class']}}" {{$attributes->except(['class', 'href'])}}>
    @if ($icon ?? '')
        <span class="link__icon">{{$icon}}</span>
    @endif
    <span class="link__label">{{ $slot->isNotEmpty() ? $slot : '' }}</span>

    @if ($iconAfter ?? '')
        <span class="link__icon">{{$iconAfter}}</span>
    @endif

</a>
