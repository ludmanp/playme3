<div class='container{{
        useModifiers('container', [
            'flex'=>$flex??false,
            ])
        }} {{$attributes['class']}}'>
    {{ $slot->isNotEmpty() ? $slot : '' }}
</div>
