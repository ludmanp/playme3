<div class="header">
    @include('core::admin._button-back', ['url' => $model->indexUrl(), 'title' => __('Shootings')])
    @include('core::admin._title', ['default' => __('New shooting')])
    @component('core::admin._buttons-form', ['model' => $model])
    @endcomponent
</div>

<div class="content">

    @include('core::admin._form-errors')

    {!! BootForm::hidden('id') !!}

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
    </ul>

    <div class="tab-content">
        <div class="tab-pane fade show active" id="tab-general">
            {!! BootForm::text(__('Title'), 'title')!!}
            {!! BootForm::select(__('Status'), 'status', \TypiCMS\Modules\Broadcasts\Enums\StatusEnum::forSelect()) !!}
            {!! BootForm::textarea(__('Summary'), 'summary')->rows(4) !!}
            {!! BootForm::select(__('Products'), 'products', \TypiCMS\Modules\Shootings\Enums\ProductEnum::forSelect())->multiple()->addClass('selectize') !!}

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
                <div class="col-sm-12">
                    <div class="mb-3">
                        <strong>{{ __('Preproduction') }}</strong>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="mb-3">
                        {!! BootForm::hidden('parameters[creativeIdea]')->value(0) !!}
                        {!! BootForm::checkbox(__('Creative Idea'), 'parameters[creativeIdea]') !!}
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="mb-3">
                        {!! BootForm::hidden('parameters[detailedScenario]')->value(0) !!}
                        {!! BootForm::checkbox(__('Detailed Scenario'), 'parameters[detailedScenario]') !!}
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="mb-3">
                        {!! BootForm::hidden('parameters[storyBoard]')->value(0) !!}
                        {!! BootForm::checkbox(__('Story Board'), 'parameters[storyBoard]') !!}
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="mb-3">
                        {!! BootForm::hidden('parameters[scenarioIsReady]')->value(0) !!}
                        {!! BootForm::checkbox(__('Detailed Scenario is Ready'), 'parameters[scenarioIsReady]') !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="mb-3">
                        <strong>{{ __('Shooting parameters') }}</strong>
                    </div>
                </div>
                <div class="col-sm-4">
                    {!! BootForm::select(__('Quantity of shooting cameras'), 'parameters[shootingCamerasQuantity]', range(1, 10)) !!}
                </div>
                <div class="col-sm-8">&nbsp;</div>
                <div class="col-sm-4">
                    {!! BootForm::select(__('Quantity of photo cameras'), 'parameters[labelPhotoCameras]', range(1, 10)) !!}
                </div>
                <div class="col-sm-8">&nbsp;</div>
                <div class="col-sm-4">
                    <div class="mb-3">
                        {!! BootForm::hidden('parameters[directorOnSet]')->value(0) !!}
                        {!! BootForm::checkbox(__('Director on set'), 'parameters[directorOnSet]') !!}
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="mb-3">
                        {!! BootForm::hidden('parameters[workWithLight]')->value(0) !!}
                        {!! BootForm::checkbox(__('Work with light on set'), 'parameters[workWithLight]') !!}
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="mb-3">
                        {!! BootForm::hidden('parameters[workWithSound]')->value(0) !!}
                        {!! BootForm::checkbox(__('Work with sound on set'), 'parameters[workWithSound]') !!}
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="mb-3">
                        {!! BootForm::hidden('parameters[makeUp]')->value(0) !!}
                        {!! BootForm::checkbox(__('Make up'), 'parameters[makeUp]') !!}
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
                @include('shootings::admin.addresses._index')
            </div>
            <div class="tab-pane fade" id="tab-dates">
                @include('shootings::admin.dates._index')
            </div>
        @endif
    </div>
</div>

@push('js')
    <script>
        $(function () {
            $('.selectize').selectize();
        })
    </script>
@endpush
