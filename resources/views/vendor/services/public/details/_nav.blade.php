@php
/** @var \TypiCMS\Modules\Services\Models\ServiceDetail $detail */
@endphp
@foreach($service->published_details as $detail)
    <x-common.link href="{{ url($detail->uri()) }}" :tag="true" :tagActive="optional($current ?? null)->id === $detail->id">{{ $detail->title }}</x-common.link>
@endforeach