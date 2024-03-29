@push('js')
    <script src="{{ asset('components/ckeditor4/ckeditor.js') }}"></script>
    <script src="{{ asset('components/ckeditor4/config-full.js') }}"></script>
@endpush

<div class="header">
    @include('core::admin._button-back', ['url' => $model->indexUrl(), 'title' => __('Articles')])
    @include('core::admin._title', ['default' => __('New article')])
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
    <div class="row">
{{--        <div class="col-sm-6">--}}
{{--            {!! BootForm::select(__('Category'), 'category_id', ['' => ''] + Blogcategories::published()->order()->get()->pluck('title', 'id')->all()) !!}--}}
{{--        </div>--}}
        <div class="col-sm-6">
            {!! BootForm::select(__('Author'), 'author_id', ['' => ''] + Authors::order()->get()->pluck('title', 'id')->all()) !!}
        </div>
        <div class="col-sm-6">
            {!! TranslatableBootForm::text(__('Location'), 'location') !!}
        </div>
        <div class="col-sm-6">
            {!! BootForm::dateTimeLocal(__('Published at'), 'published_at') !!}
        </div>
    </div>
    {!! BootForm::text(__('Tags'), 'tags')->value(old('tags') ? : $model->tags->implode(function (\TypiCMS\Modules\Core\Models\Tag $tag) {return $tag->getTranslation('tag', config('typicms.content_locale'));}, ',')) !!}
    {!! TranslatableBootForm::textarea(__('Summary'), 'summary')->rows(4) !!}
    {!! TranslatableBootForm::textarea(__('Body'), 'body')->addClass('ckeditor-full') !!}

</div>
