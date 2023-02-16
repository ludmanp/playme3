<div class="header">
    @include('core::admin._button-back', ['url' => route('admin::edit-project', $project), 'title' => $project->title])
    @include('core::admin._title', ['default' => __('New video')])
    @component('core::admin._buttons-form', ['model' => $model])
    @endcomponent
</div>

<div class="content">

    @include('core::admin._form-errors')
    {!! BootForm::hidden('id') !!}
    {!! BootForm::hidden('project_id')->value($project->id) !!}

    <file-manager related-table="{{ $model->getTable() }}" :related-id="{{ $model->id ?? 0 }}"></file-manager>
    <file-field type="image" field="image_id" :init-file="{{ $model->image ?? 'null' }}"></file-field>

    {!! TranslatableBootForm::text(__('Title'), 'title') !!}
    <div class="mb-3">
        {!! BootForm::hidden('status')->value(0) !!}
        {!! BootForm::checkbox(__('Published'), 'status') !!}
    </div>
    {!! BootForm::text(__('Link'), 'video_link') !!}
</div>
