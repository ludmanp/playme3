<?php

namespace TypiCMS\Modules\Clients\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Route;
use Laracasts\Presenter\PresentableTrait;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;
use Spatie\Translatable\HasTranslations;
use TypiCMS\Modules\Core\Models\Base;
use TypiCMS\Modules\Core\Models\File;
use TypiCMS\Modules\Core\Traits\Historable;
use TypiCMS\Modules\Clients\Presenters\ModulePresenter;
use TypiCMS\Modules\Projects\Models\Project;

/**
 * @property int $image_id
 * @property File image
 * @property string thumb
 * @property string $status
 * @property string $title
 * @property string link
 * @property int $position
 * @property Project[]|Collection projects
 * @property Project[]|Collection published_projects
 */
class Client extends Base implements Sortable
{
    use HasTranslations;
    use Historable;
    use PresentableTrait;
    use SortableTrait;

    protected $presenter = ModulePresenter::class;

    protected $guarded = [];

    protected $appends = ['thumb', 'link'];

    public $translatable = [
        'title',
        'status',
    ];

    protected function thumb(): Attribute
    {
        return new Attribute(
            get: fn () => $this->present()->image(null, 54),
        );
    }

    public function image(): BelongsTo
    {
        return $this->belongsTo(File::class, 'image_id');
    }

    public function projects(): HasMany
    {
        return $this->hasMany(Project::class, 'client_id');
    }

    public function published_projects(): HasMany
    {
        return $this->projects()->published()->order();
    }

    public function link(): Attribute
    {
        return  new Attribute(
            get: fn () => Route::has($route = config('app.locale') . '::client-projects') ? route($route, ['client' => $this]) : url('/')
        );
    }
}
