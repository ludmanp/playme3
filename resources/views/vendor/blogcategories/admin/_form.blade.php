<div class="header">
    @include('core::admin._button-back', ['url' => $model->indexUrl(), 'title' => __('Blog categories')])
    @include('core::admin._title', ['default' => __('New blog category')])
    @component('core::admin._buttons-form', ['model' => $model])
    @endcomponent
</div>

<div class="content">

    @include('core::admin._form-errors')

    {!! BootForm::hidden('id') !!}

    @include('core::form._title-and-slug')
    <div class="mb-3">
        {!! TranslatableBootForm::hidden('status')->value(0) !!}
        {!! TranslatableBootForm::checkbox(__('Published'), 'status') !!}
    </div>

</div>
