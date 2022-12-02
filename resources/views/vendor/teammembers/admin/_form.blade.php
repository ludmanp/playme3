@push('js')
    <script src="{{ asset('components/ckeditor4/ckeditor.js') }}"></script>
    <script src="{{ asset('components/ckeditor4/config-full.js') }}"></script>
@endpush

<div class="header">
    @include('core::admin._button-back', ['url' => $model->indexUrl(), 'title' => __('Teammembers')])
    @include('core::admin._title', ['default' => __('New teammember')])
    @component('core::admin._buttons-form', ['model' => $model])
    @endcomponent
</div>

<div class="content">

    @include('core::admin._form-errors')

    {!! BootForm::hidden('id') !!}

    <file-manager related-table="{{ $model->getTable() }}" :related-id="{{ $model->id ?? 0 }}"></file-manager>
    <div class="row">
        <div class="col-sm-4">
            <file-field type="image" field="image_id" :init-file="{{ $model->image ?? 'null' }}"></file-field>
        </div>
        <div class="col-sm-4">
            <file-field type="image" field="signature_image_id" :init-file="{{ $model->signature_image ?? 'null' }}"></file-field>
        </div>
    </div>

    @include('core::form._title-and-slug')
    {!! TranslatableBootForm::text(__('Name'), 'name') !!}
    <div class="mb-3">
        {!! TranslatableBootForm::hidden('status')->value(0) !!}
        {!! TranslatableBootForm::checkbox(__('Published'), 'status') !!}
    </div>
    {!! TranslatableBootForm::textarea(__('Body'), 'body')->addClass('ckeditor-full') !!}

    @if($model->exists)
        @include('teammembers::admin.socials._index')
    @endif

</div>
