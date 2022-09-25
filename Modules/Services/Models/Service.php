<?php

namespace TypiCMS\Modules\Services\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;
use Laracasts\Presenter\PresentableTrait;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;
use Spatie\Translatable\HasTranslations;
use TypiCMS\Modules\Core\Models\Base;
use TypiCMS\Modules\Core\Models\File;
use TypiCMS\Modules\Core\Traits\HasFiles;
use TypiCMS\Modules\Core\Traits\Historable;
use TypiCMS\Modules\Services\Presenters\ModulePresenter;

/**
 * @property integer $image_id
 * @property File image
 * @property string thumb
 * @property string $title
 * @property string $subtitle
 * @property string $slug
 * @property bool $status
 * @property int $position
 * @property ServiceDetail[]|Collection details
 * @property ServiceDetail[]|Collection published_details
 *
 * @method ModulePresenter present()
 */
class Service extends Base implements Sortable
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
        'subtitle',
        'slug',
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

    public function details(): HasMany
    {
        return $this->hasMany(ServiceDetail::class, 'service_id');
    }

    public function published_details(): HasMany
    {
        return $this->details()->published()->order();
    }
}