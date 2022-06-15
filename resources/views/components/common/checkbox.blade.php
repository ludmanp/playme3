@php
    if(isset($attributes['id']) && is_null($attributes['id'])) {
        $id = null;
    } else {
        $id = $attributes['id'] ?? $attributes['name'] ?? null;
    }
    $value = $attributes['value'] ?? 1;
    $checked = false;
    // dd(($withOld ?? false), ($attributes['name'] ?? false), old($attributes['name']), $value);
    if(($withOld ?? false) && ($attributes['name'] ?? false)) {
        $checked = old($attributes['name']) == $value ? true : isset($attributes['checked']);
    }
@endphp
<div class="checkboxItem{{
        useModifiers('checkboxItem', [
            'smallText'=>$smallText??false,
            ])
        }} {{$attributes['class']}}">
    <label class="checkboxBlock">{{ $checkboxText ?? '' }}
        @if(($withDefault ?? false) && ($attributes['name'] ?? false))
            <input type="hidden" name="{{ $attributes['name'] }}" value="0"/>
        @endif
        <input type="checkbox"
           @if(!is_null($id)) id='{{ $id }}' @endif
           @if($attributes['name'] ?? false) name="{{ $attributes['name'] }}" @endif
           value="{{ $value }}"
           {{ $attributes->except(['name', 'id', 'checked', 'value', 'withOld', 'withDefault']) }} @if($checked) checked @endif
        />
        <span class="checkbox__checkmark"></span>
    </label>
</div>