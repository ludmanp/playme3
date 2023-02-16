<div class="header">
    @include('core::admin._button-back', ['url' => route('admin::edit-broadcast', $broadcast), 'title' => $broadcast->title])
    @include('core::admin._title', ['default' => __('New address')])
    @component('core::admin._buttons-form', ['model' => $model])
    @endcomponent
</div>

<div class="content">
    @include('core::admin._form-errors')

    {!! BootForm::hidden('id') !!}
    {!! BootForm::hidden('broadcast_id')->value($broadcast->id) !!}

    {!! BootForm::text(__('Address'), 'address') !!}
</div>
