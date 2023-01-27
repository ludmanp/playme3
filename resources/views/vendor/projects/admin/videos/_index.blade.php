<item-list
    url-base="/api/projects/{{ $model->id }}/videos"
    locale="{{ config('typicms.content_locale') }}"
    fields="id,image_id,status,title,position,video_link,image_preview"
    table="project_videos"
    title="videos"
    include="image"
    appends="thumb"
    :exportable="false"
    :searchable="['title']"
    :sorting="['position']">

    <template slot="add-button" v-if="$can('create projects')">
        @include('core::admin._button-create', ['url' => route('admin::create-project_video', $model->id), 'module' => 'project_video'])
    </template>

    <template slot="columns" slot-scope="{ sortArray }">
        <item-list-column-header name="checkbox" v-if="$can('update projects')||$can('delete projects')"></item-list-column-header>
        <item-list-column-header name="edit" v-if="$can('update projects')"></item-list-column-header>
        <item-list-column-header name="position" sortable :sort-array="sortArray" :label="$t('Position')"></item-list-column-header>
        <item-list-column-header name="status" sortable :sort-array="sortArray" :label="$t('Status')"></item-list-column-header>
        <item-list-column-header name="image" :label="$t('Image')"></item-list-column-header>
        <item-list-column-header name="title_translated" sortable :sort-array="sortArray" :label="$t('Title')"></item-list-column-header>
        <item-list-column-header name="video_link" sortable :sort-array="sortArray" :label="$t('Link')"></item-list-column-header>
    </template>

    <template slot="table-row" slot-scope="{ model, checkedModels, loading }">
        <td class="checkbox" v-if="$can('update projects')||$can('delete projects')"><item-list-checkbox :model="model" :checked-models-prop="checkedModels" :loading="loading"></item-list-checkbox></td>
        <td v-if="$can('update projects')"><item-list-edit-button :url="'/admin/projects/{{ $model->id }}/videos/'+model.id+'/edit'"></td>
        <td><item-list-position-input :model="model"></item-list-position-input></td>
        <td><item-list-status-button :model="model"></item-list-status-button></td>
        <td><img :src="model.thumb" alt="" height="27"></td>
        <td>@{{ model.title_translated }}</td>
        <td>@{{ model.video_link }}</td>
    </template>

</item-list>
