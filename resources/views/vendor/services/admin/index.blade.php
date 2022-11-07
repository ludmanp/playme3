@extends('core::admin.master')

@section('title', __('Services'))

@section('content')

<item-list
    url-base="/api/services"
    fields="id,image_id,status,title,position"
    table="services"
    title="services"
    include="image"
    :exportable="true"
    :searchable="['title']"
    :sorting="['position']">

    <template slot="add-button" v-if="$can('create services')">
        @include('core::admin._button-create', ['module' => 'services'])
    </template>

    <template slot="columns" slot-scope="{ sortArray }">
        <item-list-column-header name="checkbox" v-if="$can('update services')||$can('delete services')"></item-list-column-header>
        <item-list-column-header name="edit" v-if="$can('update services')"></item-list-column-header>
        <item-list-column-header name="status_translated" sortable :sort-array="sortArray" :label="$t('Status')"></item-list-column-header>
        <item-list-column-header name="position" sortable :sort-array="sortArray" :label="$t('Position')"></item-list-column-header>
        <item-list-column-header name="image" :label="$t('Image')"></item-list-column-header>
        <item-list-column-header name="title_translated" sortable :sort-array="sortArray" :label="$t('Title')"></item-list-column-header>
    </template>

    <template slot="table-row" slot-scope="{ model, checkedModels, loading }">
        <td class="checkbox" v-if="$can('update services')||$can('delete services')"><item-list-checkbox :model="model" :checked-models-prop="checkedModels" :loading="loading"></item-list-checkbox></td>
        <td v-if="$can('update services')"><item-list-edit-button :url="'/admin/services/'+model.id+'/edit'"></item-list-edit-button></td>
        <td><item-list-status-button :model="model"></item-list-status-button></td>
        <td><item-list-position-input :model="model"></item-list-position-input></td>
        <td><img :src="model.thumb" alt="" height="27"></td>
        <td v-html="model.title_translated"></td>
    </template>

</item-list>

@endsection
