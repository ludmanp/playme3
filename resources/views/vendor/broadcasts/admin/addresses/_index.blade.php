<item-list
    url-base="/api/broadcasts/{{ $model->id }}/addresses"
    locale="{{ config('typicms.content_locale') }}"
    fields="id,address,position"
    table="broadcast_addresses"
    title="addresses"
    :exportable="false"
    :searchable="['address']"
    :sorting="['position']">

    <template slot="add-button" v-if="$can('create broadcasts')">
        @include('core::admin._button-create', ['url' => route('admin::create-broadcast_address', $model->id), 'module' => 'broadcast_address'])
    </template>

    <template slot="columns" slot-scope="{ sortArray }">
        <item-list-column-header name="checkbox" v-if="$can('update broadcasts')||$can('delete broadcasts')"></item-list-column-header>
        <item-list-column-header name="edit" v-if="$can('update broadcasts')"></item-list-column-header>
        <item-list-column-header name="position" sortable :sort-array="sortArray" :label="$t('Position')"></item-list-column-header>
        <item-list-column-header name="address" sortable :sort-array="sortArray" :label="$t('Address')"></item-list-column-header>
    </template>

    <template slot="table-row" slot-scope="{ model, checkedModels, loading }">
        <td class="checkbox" v-if="$can('update broadcasts')||$can('delete broadcasts')"><item-list-checkbox :model="model" :checked-models-prop="checkedModels" :loading="loading"></item-list-checkbox></td>
        <td v-if="$can('update broadcasts')"><item-list-edit-button :url="'/admin/broadcasts/{{ $model->id }}/addresses/'+model.id+'/edit'"></td>
        <td><item-list-position-input :model="model"></item-list-position-input></td>
        <td>@{{ model.address }}</td>
    </template>

</item-list>
