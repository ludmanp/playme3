<item-list
    url-base="/api/shootings/{{ $model->id }}/dates"
    locale="{{ config('typicms.content_locale') }}"
    fields="id,date,position"
    table="shooting_dates"
    title="dates"
    :exportable="false"
    :sorting="['position']">

    <template slot="add-button" v-if="$can('create shootings')">
        @include('core::admin._button-create', ['url' => route('admin::create-shooting_date', $model->id), 'module' => 'shooting_date'])
    </template>

    <template slot="columns" slot-scope="{ sortArray }">
        <item-list-column-header name="checkbox" v-if="$can('update shootings')||$can('delete shootings')"></item-list-column-header>
        <item-list-column-header name="edit" v-if="$can('update shootings')"></item-list-column-header>
        <item-list-column-header name="position" sortable :sort-array="sortArray" :label="$t('Position')"></item-list-column-header>
        <item-list-column-header name="date" :label="$t('Date')"></item-list-column-header>
    </template>

    <template slot="table-row" slot-scope="{ model, checkedModels, loading }">
        <td class="checkbox" v-if="$can('update shootings')||$can('delete shootings')"><item-list-checkbox :model="model" :checked-models-prop="checkedModels" :loading="loading"></item-list-checkbox></td>
        <td v-if="$can('update shootings')"><item-list-edit-button :url="'/admin/shootings/{{ $model->id }}/dates/'+model.id+'/edit'"></td>
        <td><item-list-position-input :model="model"></item-list-position-input></td>
        <td>@{{ model.title }}</td>
    </template>

</item-list>
