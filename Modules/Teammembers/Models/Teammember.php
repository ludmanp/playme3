<?php

namespace TypiCMS\Modules\Teammembers\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Laracasts\Presenter\PresentableTrait;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;
use Spatie\Translatable\HasTranslations;
use TypiCMS\Modules\Core\Models\Base;
use TypiCMS\Modules\Core\Models\File;
use TypiCMS\Modules\Core\Traits\HasFiles;
use TypiCMS\Modules\Core\Traits\Historable;
use TypiCMS\Modules\Projects\Models\Project;
use TypiCMS\Modules\Teammembers\Presenters\ModulePresenter;

/**
 * @property int $image_id
 * @property File image
 * @property string thumb
 * @property string $status
 * @property string $name
 * @property string $title
 * @property string $slug
 * @property string $body
 * @property int $signature_image_id
 * @property File signature_image
 * @property Project[]|Collection projects
 * @property Project[]|Collection published_projects
 */
class Teammember extends Base implements Sortable
{
    use HasTranslations;
    use Historable;
    use PresentableTrait;
    use SortableTrait;

    protected $presenter = ModulePresenter::class;

    protected $guarded = [];

    protected $appends = ['thumb'];

    public $translatable = [
        'title',
        'name',
        'slug',
        'status',
        'body',
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

    public function signature_image(): BelongsTo
    {
        return $this->belongsTo(File::class, 'signature_image_id');
    }

    public function socials()
    {
        return $this->hasMany(TeammemberSocial::class, 'teammember_id');
    }

    public function projects(): BelongsToMany
    {
        return $this->belongsToMany(
            Project::class,
            'project_teammember',
            'project_id',
            'teammember_id'
        );
    }

    public function published_projects(): BelongsToMany
    {
        return $this->projects()->published()->order();
    }

}
