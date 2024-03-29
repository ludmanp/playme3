<div class="header">
    @include('core::admin._button-back', ['url' => $model->indexUrl(), 'title' => __('Services')])
    @include('core::admin._title', ['default' => __('New service')])
    @component('core::admin._buttons-form', ['model' => $model])
    @endcomponent
</div>

<div class="content">

    @include('core::admin._form-errors')

    {!! BootForm::hidden('id') !!}

    <file-manager related-table="{{ $model->getTable() }}" :related-id="{{ $model->id ?? 0 }}"></file-manager>
    <file-field type="image" field="image_id" :init-file="{{ $model->image ?? 'null' }}"></file-field>

    @include('core::form._title-and-slug')
    <div class="mb-3">
        {!! TranslatableBootForm::hidden('status')->value(0) !!}
        {!! TranslatableBootForm::checkbox(__('Published'), 'status') !!}
    </div>
    {!! TranslatableBootForm::text(__('Subtitle'), 'subtitle') !!}

    @if($model->exists)
    @include('services::admin.details._index')
    @endif

</div>
