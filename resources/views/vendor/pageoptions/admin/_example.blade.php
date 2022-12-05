@include('pageoptions::admin.elements.image', ['name' => 'text_image', 'label' => 'Image In Text'])
@include('pageoptions::admin.elements.translatable.textarea', ['name' => 'working_time', 'label' => __('Working time')])
@include('pageoptions::admin.elements.translatable.text', ['name' => 'title', 'label' => __('Title')])
{!! BootForm::text(__('Phone'), 'options[phone]') !!}

{{-- Default template for module page --}}
@switch($model->module)
    @case('products')
{{--   Add elements     --}}
    @default
@endswitch
