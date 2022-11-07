@if ($enabledLocales = TypiCMS::enabledLocales() and count($enabledLocales) > 1)
    <div class='header__languages'>
        @foreach ($enabledLocales as $locale)
            @isset($page)
                @if ($page->isPublished($locale))
                    <x-common.link :currentLang="$locale == $lang" href="{{ isset($model) && $model->isPublished($locale) ? url($model->uri($locale)) : url($page->uri($locale)) }}">{{ $locale }}</x-common.link>
                @else
                    <x-common.link :currentLang="$locale == $lang" href="{{ url('/'.$locale) }}">{{ $locale }}</x-common.link>
                @endif
            @else
                <x-common.link :currentLang="$locale == $lang" href="{{ url('/'.$locale) }}">{{ $locale }}</x-common.link>
            @endisset
        @endforeach
    </div>
@endif
