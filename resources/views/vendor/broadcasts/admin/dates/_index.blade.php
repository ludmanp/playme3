<item-list
    url-base="/api/broadcasts/{{ $model->id }}/dates"
    locale="{{ config('typicms.content_locale') }}"
    fields="id,starts_at,arrive_at,position"
    table="broadcast_dates"
    title="dates"
    :exportable="false"
    :sorting="['position']">

    <template slot="add-button" v-if="$can('create broadcasts')">
        @include('core::admin._button-create', ['url' => route('admin::create-broadcast_date', $model->id), 'module' => 'broadcast_date'])
    </template>

    <template slot="columns" slot-scope="{ sortArray }">
        <item-list-column-header name="checkbox" v-if="$can('update broadcasts')||$can('delete broadcasts')"></item-list-column-header>
        <item-list-column-header name="edit" v-if="$can('update broadcasts')"></item-list-column-header>
        <item-list-column-header name="position" sortable :sort-array="sortArray" :label="$t('Position')"></item-list-column-header>
        <item-list-column-header name="starts_at" :label="$t('Starts at')"></item-list-column-header>
        <item-list-column-header name="arrive_at" :label="$t('Arrive at')"></item-list-column-header>
    </template>

    <template slot="table-row" slot-scope="{ model, checkedModels, loading }">
        <td class="checkbox" v-if="$can('update broadcasts')||$can('delete broadcasts')"><item-list-checkbox :model="model" :checked-models-prop="checkedModels" :loading="loading"></item-list-checkbox></td>
        <td v-if="$can('update broadcasts')"><item-list-edit-button :url="'/admin/broadcasts/{{ $model->id }}/dates/'+model.id+'/edit'"></td>
        <td><item-list-position-input :model="model"></item-list-position-input></td>
        <td>@{{ model.title }}</td>
        <td>@{{ model.arrive_time }}</td>
    </template>

</item-list>
