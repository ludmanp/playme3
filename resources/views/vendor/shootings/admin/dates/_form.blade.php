<div class="header">
    @include('core::admin._button-back', ['url' => route('admin::edit-shooting', $shooting), 'title' => $shooting->title])
    @include('core::admin._title', ['default' => __('New date')])
    @component('core::admin._buttons-form', ['model' => $model])
    @endcomponent
</div>

<div class="content">
    @include('core::admin._form-errors')

    {!! BootForm::hidden('id') !!}
    {!! BootForm::hidden('shooting_id')->value($shooting->id) !!}

    {!! BootForm::date(__('Date'), 'date') !!}
</div>
