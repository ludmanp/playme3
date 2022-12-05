<div class="header">
    @include('core::admin._button-back', ['url' => route('admin::edit-teammember', $teammember)])
    @include('core::admin._title', ['default' => __('New teammember social')])
    @component('core::admin._buttons-form', ['model' => $model])
    @endcomponent
</div>

<div class="content">
    {!! BootForm::hidden('id') !!}
    {!! BootForm::hidden('teammember_id')->value($teammember->id) !!}

    <file-manager related-table="{{ $model->getTable() }}" :related-id="{{ $model->id ?? 0 }}"></file-manager>
    <file-field type="image" field="image_id" :init-file="{{ $model->image ?? 'null' }}"></file-field>

    {!! BootForm::text(__('Title'), 'title') !!}
    {!! BootForm::text(__('Link'), 'link') !!}
    <div class="mb-3">
        {!! TranslatableBootForm::hidden('status')->value(0) !!}
        {!! TranslatableBootForm::checkbox(__('Published'), 'status') !!}
    </div>
</div>
