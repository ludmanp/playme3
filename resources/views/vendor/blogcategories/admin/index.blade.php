@extends('core::admin.master')

@section('title', __('Blog categories'))

@section('content')

<item-list
    url-base="/api/blogcategories"
    fields="id,status,title,position"
    table="blogcategories"
    title="categories"
    include=""
    :exportable="true"
    :searchable="['title']"
    :sorting="['title_translated']">

    <template slot="add-button" v-if="$can('create blogcategories')">
        @include('core::admin._button-create', ['module' => 'blogcategories'])
    </template>

    <template slot="columns" slot-scope="{ sortArray }">
        <item-list-column-header name="checkbox" v-if="$can('update blogcategories')||$can('delete blogcategories')"></item-list-column-header>
        <item-list-column-header name="edit" v-if="$can('update blogcategories')"></item-list-column-header>
        <item-list-column-header name="status_translated" sortable :sort-array="sortArray" :label="$t('Status')"></item-list-column-header>
        <item-list-column-header name="position" sortable :sort-array="sortArray" :label="$t('Position')"></item-list-column-header>
        <item-list-column-header name="title_translated" sortable :sort-array="sortArray" :label="$t('Title')"></item-list-column-header>
    </template>

    <template slot="table-row" slot-scope="{ model, checkedModels, loading }">
        <td class="checkbox" v-if="$can('update blogcategories')||$can('delete blogcategories')"><item-list-checkbox :model="model" :checked-models-prop="checkedModels" :loading="loading"></item-list-checkbox></td>
        <td v-if="$can('update blogcategories')"><item-list-edit-button :url="'/admin/blogcategories/'+model.id+'/edit'"></item-list-edit-button></td>
        <td><item-list-status-button :model="model"></item-list-status-button></td>
        <td><item-list-position-input :model="model"></item-list-position-input></td>
        <td v-html="model.title_translated"></td>
    </template>

</item-list>

@endsection
