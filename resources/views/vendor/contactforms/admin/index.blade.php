@extends('core::admin.master')

@section('title', __('Contactforms'))

@section('content')

<item-list
    url-base="/api/contactforms"
    fields="id,name,email,phone,message,lang,created_at"
    table="contactforms"
    title="contactforms"
    :exportable="true"
    :searchable="['name,phone,email']"
    :sorting="['created_at']">

    <template slot="columns" slot-scope="{ sortArray }">
        <item-list-column-header name="checkbox" v-if="$can('update contactforms')||$can('delete contactforms')"></item-list-column-header>
        <item-list-column-header name="created_at" sortable :sort-array="sortArray" :label="$t('Created At')"></item-list-column-header>
        <item-list-column-header name="name" sortable :sort-array="sortArray" :label="$t('Name')"></item-list-column-header>
        <item-list-column-header name="email" :label="$t('Email')"></item-list-column-header>
        <item-list-column-header name="phone" :label="$t('Phone')"></item-list-column-header>
        <item-list-column-header name="lang" :label="$t('Lang')"></item-list-column-header>
        <item-list-column-header name="message" :label="$t('Message')"></item-list-column-header>
    </template>

    <template slot="table-row" slot-scope="{ model, checkedModels, loading }">
        <td class="checkbox" v-if="$can('update contactforms')||$can('delete contactforms')"><item-list-checkbox :model="model" :checked-models-prop="checkedModels" :loading="loading"></item-list-checkbox></td>
        <td v-html="model.created_at"></td>
        <td v-html="model.name"></td>
        <td v-html="model.email"></td>
        <td v-html="model.phone"></td>
        <td v-html="model.lang"></td>
        <td v-html="model.message"></td>
    </template>

</item-list>

@endsection
