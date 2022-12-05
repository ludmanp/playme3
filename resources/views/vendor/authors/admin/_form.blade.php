<div class="header">
    @include('core::admin._button-back', ['url' => $model->indexUrl(), 'title' => __('Authors')])
    @include('core::admin._title', ['default' => __('New author')])
    @component('core::admin._buttons-form', ['model' => $model])
    @endcomponent
</div>

<div class="content">

    @include('core::admin._form-errors')

    {!! BootForm::hidden('id') !!}

    <file-manager related-table="{{ $model->getTable() }}" :related-id="{{ $model->id ?? 0 }}"></file-manager>
    <file-field type="image" field="image_id" :init-file="{{ $model->image ?? 'null' }}"></file-field>

    @include('core::form._title-and-slug')
</div>
