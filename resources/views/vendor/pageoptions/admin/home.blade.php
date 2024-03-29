<h3>@lang('Head')</h3>
{{--@include('pageoptions::admin.elements.image', ['name' => 'head_image', 'label' => 'HEad image'])--}}
@include('pageoptions::admin.elements.translatable.text', ['name' => 'title', 'label' => __('Title')])
@include('pageoptions::admin.elements.translatable.text', ['name' => 'subtitle', 'label' => __('Subtitle')])
@include('pageoptions::admin.elements.translatable.textarea', ['name' => 'header_text', 'label' => __('Header text'), 'attributes' => ['rows' => 3]])
@include('pageoptions::admin.elements.translatable.text', ['name' => 'contact_link', 'label' => __('Contact link')])
{!! BootForm::text(__('Video link'), 'options[video_link]') !!}
<h3>@lang('Facts')</h3>
@include('pageoptions::admin.elements.translatable.text', ['name' => 'facts_title', 'label' => __('Facts title')])
@include('pageoptions::admin.elements.translatable.textarea', ['name' => 'facts_text', 'label' => __('Facts text'), 'attributes' => ['rows' => 3]])
