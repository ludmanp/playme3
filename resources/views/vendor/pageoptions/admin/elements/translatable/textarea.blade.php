@foreach(locales() as $locale)
    <div class="form-group-translation">
        @php
            $el = BootForm::textarea(($label ?? '') . ' ('.$locale.')', 'options' . ($nameForInput ?? '') . '['.$locale.']')
                ->attribute(config('translatable-bootforms.input-locale-attribute'), $locale);
            if($className ?? false){
                $el->addClass($className);
            }
            if(!empty($attributes ?? [])){
                foreach($attributes as $key => $val){
                    $el->attribute($key, $val);
                }
            }
        @endphp
        {!! $el !!}
    </div>
@endforeach
