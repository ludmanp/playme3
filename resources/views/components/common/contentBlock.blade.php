<div class='contentBlock'>
    <div class='contentBlock__header'>
        {{ $header ?? '' }}
    </div>

    @if ($content ?? '')
    <div class='contentBlock__content'>
        {{ $content }}
    </div>
    @endif
    @if ($actions ?? '')
    <div class='contentBlock__actions'>
        {{ $actions }}
    </div>
    @endif
</div>
