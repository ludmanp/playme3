@php
    /** @var \TypiCMS\Modules\Projects\Models\Project $model */
@endphp
@push('js')
    <script src="{{ asset('components/ckeditor4/ckeditor.js') }}"></script>
    <script src="{{ asset('components/ckeditor4/config-full.js') }}"></script>
@endpush

<div class="header">
    @include('core::admin._button-back', ['url' => $model->indexUrl(), 'title' => __('Projects')])
    @include('core::admin._title', ['default' => __('New project')])
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
    </div>

    @include('core::form._title-and-slug')
    <div class="mb-3">
        {!! BootForm::hidden('status')->value(0) !!}
        {!! BootForm::checkbox(__('Published'), 'status') !!}
    </div>

    {!! BootForm::select(__('Client'), 'client_id', Clients::query()->get()->pluck('title', 'id')->all()) !!}

    <div class="row">
        <div class="col-sm-6">
            {!! BootForm::date(__('Date'), 'date') !!}
        </div>
        <div class="col-sm-6">
            {!! BootForm::text(__('Location'), 'location') !!}
        </div>
    </div>

    {!! BootForm::select(__('Team members'), 'team_members', Teammembers::query()->get()->pluck('name', 'id')->all())
                ->select(old('team_members') ?: $model->team_members->pluck('id')->all())
                ->multiple() !!}

    {!! BootForm::text(__('Tags'), 'tags')->value(old('tags') ? : $model->tags->implode(function (\TypiCMS\Modules\Core\Models\Tag $tag) {return $tag->getTranslation('tag', config('typicms.content_locale'));}, ',')) !!}

    {!! TranslatableBootForm::textarea(__('Summary'), 'summary')->rows(4) !!}
    {!! TranslatableBootForm::textarea(__('Body'), 'body')->addClass('ckeditor-full') !!}
</div>

@push('js')
    <script>
        $(function(){
            $('#client_id').selectize();
        })
        $(function(){
            $('#team_members').selectize();
        })
    </script>
@endpush
