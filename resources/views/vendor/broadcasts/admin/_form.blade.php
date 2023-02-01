@push('js')
    <script src="{{ asset('components/ckeditor4/ckeditor.js') }}"></script>
    <script src="{{ asset('components/ckeditor4/config-full.js') }}"></script>
@endpush

<div class="header">
    @include('core::admin._button-back', ['url' => $model->indexUrl(), 'title' => __('Broadcasts')])
    @include('core::admin._title', ['default' => __('New broadcast')])
    @component('core::admin._buttons-form', ['model' => $model])
    @endcomponent
</div>

<div class="content">

    @include('core::admin._form-errors')

    {!! BootForm::hidden('id') !!}

    <file-manager related-table="{{ $model->getTable() }}" :related-id="{{ $model->id ?? 0 }}"></file-manager>

    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" href="#tab-general" data-bs-toggle="tab">{{ __('General') }}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#tab-parameters" data-bs-toggle="tab">{{ __('Parameters') }}</a>
        </li>
        @if($model->exists)
        <li class="nav-item">
            <a class="nav-link" href="#tab-addresses" data-bs-toggle="tab">{{ __('Addresses') }}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#tab-dates" data-bs-toggle="tab">{{ __('Dates') }}</a>
        </li>
        @endif
        <li class="nav-item">
            <a class="nav-link" href="#tab-broadcasting" data-bs-toggle="tab">{{ __('Broadcasting') }}</a>
        </li>
    </ul>


    <div class="tab-content">
        <div class="tab-pane fade show active" id="tab-general">
            <file-field type="image" field="image_id" :init-file="{{ $model->image ?? 'null' }}"></file-field>

            {!! BootForm::text(__('Title'), 'title')!!}
            {!! BootForm::select(__('Status'), 'status', \TypiCMS\Modules\Broadcasts\Enums\StatusEnum::forSelect()) !!}
            {!! BootForm::textarea(__('Summary'), 'summary')->rows(4) !!}

            <div class="row">
                <div class="col-sm-4">
                    {!! BootForm::text(__('Contact Name'), 'contact_name')!!}
                </div>
                <div class="col-sm-4">
                    {!! BootForm::text(__('Contact Phone'), 'contact_phone')!!}
                </div>
                <div class="col-sm-4">
                    {!! BootForm::text(__('Contact Email'), 'contact_email')!!}
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    {!! BootForm::text(__('Project manager Name'), 'leader_name')!!}
                </div>
                <div class="col-sm-4">
                    {!! BootForm::text(__('Project manager Phone'), 'leader_phone')!!}
                </div>
                <div class="col-sm-4">
                    {!! BootForm::text(__('Project manager Email'), 'leader_email')!!}
                </div>
            </div>
            <div class="row">
                <div class="col-sm-8">
                    {!! BootForm::text(__('Company name'), 'company')!!}
                </div>
                <div class="col-sm-4">
                    {!! BootForm::text(__('Registration number'), 'registration_nr')!!}
                </div>
                <div class="col-sm-4">
                    {!! BootForm::text(__('Legal address'), 'legal_address')!!}
                </div>
                <div class="col-sm-4">
                    {!! BootForm::text(__('Company phone'), 'company_phone')!!}
                </div>
                <div class="col-sm-4">
                    {!! BootForm::text(__('Company email'), 'company_phone')!!}
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="tab-parameters">
            <div class="row">
                <div class="col-sm-4">
                    {!! BootForm::select(__('Quantity of cameras'), 'parameters[camerasQuantity]', range(1, 10)) !!}
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-4">
                    <div class="mb-3">
                        {!! BootForm::hidden('is_public')->value(0) !!}
                        {!! BootForm::checkbox(__('Public'), 'is_public') !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="mb-3">
                        <strong>{{ __('Logistics') }}</strong>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="mb-3">
                        {!! BootForm::hidden('parameters[equipmentDelivery]')->value(0) !!}
                        {!! BootForm::checkbox(__('Equipment delivery'), 'parameters[equipmentDelivery]') !!}
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="mb-3">
                        {!! BootForm::hidden('parameters[broadcastOnPlatform]')->value(0) !!}
                        {!! BootForm::checkbox(__('Broadcast on platform'), 'parameters[broadcastOnPlatform]') !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="mb-3">
                        <strong>{{ __('Decoration') }}</strong>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="mb-3">
                        {!! BootForm::hidden('parameters[makeUp]')->value(0) !!}
                        {!! BootForm::checkbox(__('Make up'), 'parameters[makeUp]') !!}
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="mb-3">
                        {!! BootForm::hidden('parameters[graphicDesign]')->value(0) !!}
                        {!! BootForm::checkbox(__('Graphics design'), 'parameters[graphicDesign]') !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="mb-3">
                        <strong>{{ __('Final video preparation') }}</strong>
                    </div>
                </div>
                <div class="col-sm-4">
                    {!! BootForm::select(__('Quantity of cameras'), 'parameters[finalVideoCamerasQuantity]', range(1, 10)) !!}
                </div>
                <div class="col-sm-8">&nbsp;</div>
                <div class="col-sm-4">
                    <div class="mb-3">
                        {!! BootForm::hidden('parameters[workWithLight]')->value(0) !!}
                        {!! BootForm::checkbox(__('Work with light'), 'parameters[workWithLight]') !!}
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="mb-3">
                        {!! BootForm::hidden('parameters[workWithSound]')->value(0) !!}
                        {!! BootForm::checkbox(__('Work with sound'), 'parameters[workWithSound]') !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="mb-3">
                        <strong>{{ __('Post products') }}</strong>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="mb-3">
                        {!! BootForm::hidden('parameters[socialVideo]')->value(0) !!}
                        {!! BootForm::checkbox(__('Video for social media'), 'parameters[socialVideo]') !!}
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="mb-3">
                        {!! BootForm::hidden('parameters[reportingVideo]')->value(0) !!}
                        {!! BootForm::checkbox(__('Reporting video'), 'parameters[reportingVideo]') !!}
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="mb-3">
                        {!! BootForm::hidden('parameters[corporateVideo]')->value(0) !!}
                        {!! BootForm::checkbox(__('Corporate video'), 'parameters[corporateVideo]') !!}
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="mb-3">
                        {!! BootForm::hidden('parameters[promoVideo]')->value(0) !!}
                        {!! BootForm::checkbox(__('Promo video'), 'parameters[promoVideo]') !!}
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="mb-3">
                        {!! BootForm::hidden('parameters[conference2h]')->value(0) !!}
                        {!! BootForm::checkbox(__('Conference till 2 hrs'), 'parameters[conference2h]') !!}
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="mb-3">
                        {!! BootForm::hidden('parameters[conference4h]')->value(0) !!}
                        {!! BootForm::checkbox(__('Conference till 4 hrs'), 'parameters[conference4h]') !!}
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="mb-3">
                        {!! BootForm::hidden('parameters[templateElements]')->value(0) !!}
                        {!! BootForm::checkbox(__('Template elements'), 'parameters[templateElements]') !!}
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="mb-3">
                        {!! BootForm::hidden('parameters[customElements]')->value(0) !!}
                        {!! BootForm::checkbox(__('Custom elements'), 'parameters[customElements]') !!}
                    </div>
                </div>
            </div>
        </div>
        @if($model->exists)
        <div class="tab-pane fade" id="tab-addresses">
            @include('broadcasts::admin.addresses._index')
        </div>
        <div class="tab-pane fade" id="tab-dates">
            @include('broadcasts::admin.dates._index')
        </div>
        @endif
        <div class="tab-pane fade" id="tab-broadcasting">
            {!! BootForm::textarea(__('Embed script'), 'embed_script')->rows(4) !!}
        </div>
    </div>
</div>

