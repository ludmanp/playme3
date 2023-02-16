<div class='tabNavBlock{{
        useModifiers('tabNavBlock', [
            'service'=>$service??false,])
        }} {{$attributes['class']}}'>
    {{ $slot->isNotEmpty() ? $slot : '' }}
</div>
