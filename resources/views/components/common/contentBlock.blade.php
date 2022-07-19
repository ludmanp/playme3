<div class="contentBlock{{
        useModifiers('contentBlock', [
            'thin'=>$thin??false,
            'row'=>$row??false,
            ])
        }} {{$attributes['class']}}" {{$attributes->except(['class'])}}>
    <div class='contentBlock__header'>
        {{ $header ?? '' }}
    </div>

    @if ($subheader ?? '')
        <div class='contentBlock__subheader'>
            {{ $subheader ?? '' }}
        </div>
    @endif

    @if ($additionalHeader ?? '')
        <div class='contentBlock__additionalHeader'>
            {{ $additionalHeader ?? '' }}
        </div>
    @endif

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
