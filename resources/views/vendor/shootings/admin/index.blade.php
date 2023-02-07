@extends('core::admin.master')

@section('title', __('Shootings'))

@section('content')

<item-list
    url-base="/api/shootings"
    fields="id,status,title"
    table="shootings"
    title="shootings"
    :exportable="false"
    :searchable="['title']"
    :sorting="['title']">

{{--    <template slot="add-button" v-if="$can('create shootings')">--}}
{{--        @include('core::admin._button-create', ['module' => 'shootings'])--}}
{{--    </template>--}}

    <template slot="columns" slot-scope="{ sortArray }">
        <item-list-column-header name="checkbox" v-if="$can('update shootings')||$can('delete shootings')"></item-list-column-header>
        <item-list-column-header name="edit" v-if="$can('update shootings')"></item-list-column-header>
        <item-list-column-header name="status" sortable :sort-array="sortArray" :label="$t('Status')"></item-list-column-header>
        <item-list-column-header name="title" sortable :sort-array="sortArray" :label="$t('Title')"></item-list-column-header>
    </template>

    <template slot="table-row" slot-scope="{ model, checkedModels, loading }">
        <td class="checkbox" v-if="$can('update shootings')||$can('delete shootings')"><item-list-checkbox :model="model" :checked-models-prop="checkedModels" :loading="loading"></item-list-checkbox></td>
        <td v-if="$can('update shootings')"><item-list-edit-button :url="'/admin/shootings/'+model.id+'/edit'"></item-list-edit-button></td>
        <td>
            <span class="badge me-1" :class="{ 'bg-warning': model.status==='new', 'bg-success': model.status==='approved', 'bg-danger': model.status==='declined' }">@{{ model.status }}</span>
        </td>
        <td v-html="model.title"></td>
    </template>

</item-list>

@endsection
