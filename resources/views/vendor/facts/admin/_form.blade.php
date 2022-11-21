<div class="header">
    @include('core::admin._button-back', ['url' => $model->indexUrl(), 'title' => __('Facts')])
    @include('core::admin._title', ['default' => __('New fact')])
    @component('core::admin._buttons-form', ['model' => $model])
    @endcomponent
</div>

<div class="content">

    @include('core::admin._form-errors')

    {!! BootForm::hidden('id') !!}

    <file-manager related-table="{{ $model->getTable() }}" :related-id="{{ $model->id ?? 0 }}"></file-manager>
    <file-field type="image" field="image_id" :init-file="{{ $model->image ?? 'null' }}"></file-field>

    {!! BootForm::text(__('Number'), 'number') !!}
    {!! TranslatableBootForm::text(__('Title'), 'title') !!}
    <div class="mb-3">
        {!! TranslatableBootForm::hidden('status')->value(0) !!}
        {!! TranslatableBootForm::checkbox(__('Published'), 'status') !!}
    </div>
    {!! TranslatableBootForm::text(__('Link'), 'link') !!}
    {!! TranslatableBootForm::text(__('Link title'), 'link_title') !!}

</div>
