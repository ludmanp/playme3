<?php

namespace TypiCMS\Modules\Facts\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Laracasts\Presenter\PresentableTrait;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;
use Spatie\Translatable\HasTranslations;
use TypiCMS\Modules\Core\Models\Base;
use TypiCMS\Modules\Core\Models\File;
use TypiCMS\Modules\Core\Traits\HasFiles;
use TypiCMS\Modules\Core\Traits\Historable;
use TypiCMS\Modules\Facts\Presenters\ModulePresenter;

/**
 * @property int $image_id
 * @property File image
 * @property string thumb
 * @property boolean $status
 * @property int $number
 * @property string $title
 * @property string $link
 * @property string $link_title
 * @property int $position
 */
class Fact extends Base implements Sortable
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
        'status',
        'link',
        'link_title',
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
}
