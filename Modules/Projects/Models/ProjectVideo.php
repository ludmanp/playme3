<?php

namespace TypiCMS\Modules\Projects\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Route;
use Laracasts\Presenter\PresentableTrait;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;
use Spatie\Translatable\HasTranslations;
use TypiCMS\Modules\Core\Models\Base;
use TypiCMS\Modules\Core\Models\File;
use TypiCMS\Modules\Core\Traits\Historable;
use TypiCMS\Modules\Projects\Presenters\VideoModulePresenter;

/**
 * Class Video
 * @package TypiCMS\Modules\Projects\Models
 *
 * @property string $title
 * @property bool $status
 * @property integer $project_id
 * @property Project project
 * @property string $video_link
 * @property string $image_preview
 *
 * @method VideoModulePresenter present()
 */
class ProjectVideo extends Base implements Sortable
{
    use HasTranslations;
    use Historable;
    use PresentableTrait;
    use SortableTrait;

    protected $presenter = VideoModulePresenter::class;

    protected $guarded = [];

    protected $appends = ['thumb'];

    public $translatable = [
        'title',
    ];

    public function getThumbAttribute(): string
    {
        if ($this->image_id){
            return $this->present()->image(null, 54);
        }elseif($this->image_preview){
            return $this->present()->imagePreviewThumb(null, 54);
        }
        return '';
    }

    public function image(): BelongsTo
    {
        return $this->belongsTo(File::class, 'image_id');
    }

    public function buildSortQuery()
    {
        return static::where('project_id', $this->project_id);
    }

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class, 'project_id');
    }

    public function editUrl(): string
    {
        $route = 'admin::edit-project_video';
        if (Route::has($route)) {
            return route($route, ['project' => $this->project_id, 'video' => $this->id]);
        }

        return route('admin::dashboard');
    }

    public function indexUrl(): string
    {
        $route = 'admin::edit-project';
        if (Route::has($route)) {
            return route($route, $this->project_id);
        }

        return route('admin::dashboard');
    }
}
