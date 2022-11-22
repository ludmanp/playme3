@extends('core::admin.master')

@section('title', __('Authors'))

@section('content')

<item-list
    url-base="/api/authors"
    fields="id,image_id,title"
    table="authors"
    title="authors"
    include="image"
    :exportable="false"
    :searchable="['title']"
    :sorting="['title_translated']">

    <template slot="add-button" v-if="$can('create authors')">
        @include('core::admin._button-create', ['module' => 'authors'])
    </template>

    <template slot="columns" slot-scope="{ sortArray }">
        <item-list-column-header name="checkbox" v-if="$can('update authors')||$can('delete authors')"></item-list-column-header>
        <item-list-column-header name="edit" v-if="$can('update authors')"></item-list-column-header>
        <item-list-column-header name="image" :label="$t('Image')"></item-list-column-header>
        <item-list-column-header name="title_translated" sortable :sort-array="sortArray" :label="$t('Title')"></item-list-column-header>
    </template>

    <template slot="table-row" slot-scope="{ model, checkedModels, loading }">
        <td class="checkbox" v-if="$can('update authors')||$can('delete authors')"><item-list-checkbox :model="model" :checked-models-prop="checkedModels" :loading="loading"></item-list-checkbox></td>
        <td v-if="$can('update authors')"><item-list-edit-button :url="'/admin/authors/'+model.id+'/edit'"></item-list-edit-button></td>
        <td><img :src="model.thumb" alt="" height="27"></td>
        <td v-html="model.title_translated"></td>
    </template>

</item-list>

@endsection
