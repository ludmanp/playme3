<div class='container{{
        useModifiers('container', [
            'flex'=>$flex??false,
            'fullWidth'=>$fullWidth??false,
            ])
        }} {{$attributes['class']}}'>
    {{ $slot->isNotEmpty() ? $slot : '' }}
</div>
