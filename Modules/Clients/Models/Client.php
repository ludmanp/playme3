<?php

namespace TypiCMS\Modules\Clients\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Laracasts\Presenter\PresentableTrait;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;
use Spatie\Translatable\HasTranslations;
use TypiCMS\Modules\Core\Models\Base;
use TypiCMS\Modules\Core\Models\File;
use TypiCMS\Modules\Core\Traits\Historable;
use TypiCMS\Modules\Clients\Presenters\ModulePresenter;

/**
 * @property int $image_id
 * @property File image
 * @property string thumb
 * @property string $status
 * @property string $title
 * @property string $link
 * @property int $position
 */
class Client extends Base implements Sortable
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
