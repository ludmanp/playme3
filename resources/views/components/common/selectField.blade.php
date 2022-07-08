<div class='selectField'>
    <label for='{{ $attributes['id'] }}'>{{ $slot->isNotEmpty() ? $slot : '' }}</label>
    <select name="{{ $attributes['name'] }}" id="{{ $attributes['id'] }}">
        @for ($i = 1; $i <= $options; $i++)
            <option value="{{ $i }}">{{ $i }}</option>
        @endfor
    </select>
</div>
