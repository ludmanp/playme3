@extends('core::admin.master')

@section('title', __('Broadcasts'))

@section('content')

<item-list
    url-base="/api/broadcasts"
    fields="id,image_id,status,title"
    table="broadcasts"
    title="broadcasts"
    include="image"
    :exportable="true"
    :searchable="['title']"
    :sorting="['title']">

{{--    <template slot="add-button" v-if="$can('create broadcasts')">--}}
{{--        @include('core::admin._button-create', ['module' => 'broadcasts'])--}}
{{--    </template>--}}

    <template slot="columns" slot-scope="{ sortArray }">
        <item-list-column-header name="checkbox" v-if="$can('update broadcasts')||$can('delete broadcasts')"></item-list-column-header>
        <item-list-column-header name="edit" v-if="$can('update broadcasts')"></item-list-column-header>
        <item-list-column-header name="status" sortable :sort-array="sortArray" :label="$t('Status')"></item-list-column-header>
        <item-list-column-header name="image" :label="$t('Image')"></item-list-column-header>
        <item-list-column-header name="title" sortable :sort-array="sortArray" :label="$t('Title')"></item-list-column-header>
    </template>

    <template slot="table-row" slot-scope="{ model, checkedModels, loading }">
        <td class="checkbox" v-if="$can('update broadcasts')||$can('delete broadcasts')"><item-list-checkbox :model="model" :checked-models-prop="checkedModels" :loading="loading"></item-list-checkbox></td>
        <td v-if="$can('update broadcasts')"><item-list-edit-button :url="'/admin/broadcasts/'+model.id+'/edit'"></item-list-edit-button></td>
        <td>
        <span class="badge me-1" :class="{ 'bg-warning': model.status==='new', 'bg-success': model.status==='approved', 'bg-danger': model.status==='declined' }">@{{ model.status }}</span>
        </td>
        <td v-html="model.status"></td>
        <td><img :src="model.thumb" alt="" height="27"></td>
        <td v-html="model.title"></td>
    </template>

</item-list>

@endsection
