<div class="row gx-3">
    <div class="col-md-6">
        {!! TranslatableBootForm::text($sourceLabel ?? __('Title'), $sourceField ?? 'title') !!}
    </div>
    <div class="col-md-6">
        @include('core::form._slug', ['source' => $sourceField ?? 'title'])
    </div>
</div>
