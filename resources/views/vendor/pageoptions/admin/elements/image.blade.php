@php
// dot separated name
    $image = null;
    if(data_get($model->options, $name)){
        $image = Files::find($model->options[$name]);
    }
@endphp
<file-field type="image" field="options{{ $nameForInput }}" :init-file="{{ $image ?? 'null' }}" label="{{ $label ?? 'Image' }}"></file-field>
