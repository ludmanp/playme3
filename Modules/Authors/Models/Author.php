<?php

namespace TypiCMS\Modules\Authors\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Laracasts\Presenter\PresentableTrait;
use Spatie\Translatable\HasTranslations;
use TypiCMS\Modules\Core\Models\Base;
use TypiCMS\Modules\Core\Models\File;
use TypiCMS\Modules\Core\Traits\HasFiles;
use TypiCMS\Modules\Core\Traits\Historable;
use TypiCMS\Modules\Authors\Presenters\ModulePresenter;

/**
 * @property int $image_id
 * @property File image
 * @property string thumb
 * @property string $title
 * @property string $slug
 */
class Author extends Base
{
    use HasTranslations;
    use Historable;
    use PresentableTrait;

    protected $presenter = ModulePresenter::class;

    protected $guarded = [];

    protected $appends = ['thumb'];

    public $translatable = [
        'title',
        'slug',
    ];

    public function isPublished($locale = null): bool
    {
        return true;
    }

    public function scopePublished(Builder $query): Builder
    {
        return $query;
    }

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
}
