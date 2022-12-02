<div class='blogSingleText'>
    @if($text ?? false)
    <p>{{ $text ?? '' }}</p>
    @endif
    {{ $html ?? '' }}
</div>
