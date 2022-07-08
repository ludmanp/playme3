<a href="{{ $href ?? '' }}" class="link{{
        useModifiers('link', [
            'withImage'=>$withImage??false,
            'withImageAfter'=>$withImageAfter??false,
            'currentLang'=>$currentLang??false,
            'uppercase'=>$uppercase??false,
            'inlineText'=>$inlineText??false,
            ])
        }} {{$attributes['class']}}" {{$attributes->except(['class'])}}>
    @if ($icon ?? '')
        <span class="link__icon">{{$icon}}</span>
    @endif
    <span class="link__label">{{$slot}}</span>

    @if ($iconAfter ?? '')
        <span class="link__icon">{{$iconAfter}}</span>
    @endif

</a>
