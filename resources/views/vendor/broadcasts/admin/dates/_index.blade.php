<item-list
    url-base="/api/broadcasts/{{ $model->id }}/dates"
    locale="{{ config('typicms.content_locale') }}"
    fields="id,image_id,status,title,position"
    table="broadcast_dates"
    title="dates"
    include="image"
    appends="thumb"
    :exportable="false"
    :searchable="['title']"
    :sorting="['position']">

    <template slot="add-button" v-if="$can('create broadcasts')">
        @include('core::admin._button-create', ['url' => route('admin::create-broadcast_date', $model->id), 'module' => 'broadcast_date'])
    </template>

    <template slot="columns" slot-scope="{ sortArray }">
        <item-list-column-header name="checkbox" v-if="$can('update broadcasts')||$can('delete broadcasts')"></item-list-column-header>
        <item-list-column-header name="edit" v-if="$can('update broadcasts')"></item-list-column-header>
        <item-list-column-header name="position" sortable :sort-array="sortArray" :label="$t('Position')"></item-list-column-header>
        <item-list-column-header name="status_translated" sortable :sort-array="sortArray" :label="$t('Status')"></item-list-column-header>
        <item-list-column-header name="image" :label="$t('Image')"></item-list-column-header>
        <item-list-column-header name="title_translated" sortable :sort-array="sortArray" :label="$t('Title')"></item-list-column-header>
    </template>

    <template slot="table-row" slot-scope="{ model, checkedModels, loading }">
        <td class="checkbox" v-if="$can('update broadcasts')||$can('delete broadcasts')"><item-list-checkbox :model="model" :checked-models-prop="checkedModels" :loading="loading"></item-list-checkbox></td>
        <td v-if="$can('update broadcasts')">@include('core::admin._button-edit', ['segment' => 'dates', 'module' => 'broadcast_dates'])</td>
        <td><item-list-position-input :model="model"></item-list-position-input></td>
        <td><item-list-status-button :model="model"></item-list-status-button></td>
        <td><img :src="model.thumb" alt="" height="27"></td>
        <td>@{{ model.title_translated }}</td>
    </template>

</item-list>
