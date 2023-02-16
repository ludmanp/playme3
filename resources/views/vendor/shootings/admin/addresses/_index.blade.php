<item-list
    url-base="/api/shootings/{{ $model->id }}/addresses"
    locale="{{ config('typicms.content_locale') }}"
    fields="id,address,position"
    table="shooting_addresses"
    title="addresses"
    :exportable="false"
    :searchable="['address']"
    :sorting="['position']">

    <template slot="add-button" v-if="$can('create shootings')">
        @include('core::admin._button-create', ['url' => route('admin::create-shooting_address', $model->id), 'module' => 'shooting_address'])
    </template>

    <template slot="columns" slot-scope="{ sortArray }">
        <item-list-column-header name="checkbox" v-if="$can('update shootings')||$can('delete shootings')"></item-list-column-header>
        <item-list-column-header name="edit" v-if="$can('update shootings')"></item-list-column-header>
        <item-list-column-header name="position" sortable :sort-array="sortArray" :label="$t('Position')"></item-list-column-header>
        <item-list-column-header name="address" sortable :sort-array="sortArray" :label="$t('Address')"></item-list-column-header>
    </template>

    <template slot="table-row" slot-scope="{ model, checkedModels, loading }">
        <td class="checkbox" v-if="$can('update shootings')||$can('delete shootings')"><item-list-checkbox :model="model" :checked-models-prop="checkedModels" :loading="loading"></item-list-checkbox></td>
        <td v-if="$can('update shootings')"><item-list-edit-button :url="'/admin/shootings/{{ $model->id }}/addresses/'+model.id+'/edit'"></td>
        <td><item-list-position-input :model="model"></item-list-position-input></td>
        <td>@{{ model.address }}</td>
    </template>

</item-list>
