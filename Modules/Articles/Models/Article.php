<?php

namespace TypiCMS\Modules\Articles\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Laracasts\Presenter\PresentableTrait;
use Spatie\Translatable\HasTranslations;
use TypiCMS\Modules\Authors\Models\Author;
use TypiCMS\Modules\Blogcategories\Models\Blogcategory;
use TypiCMS\Modules\Core\Models\Base;
use TypiCMS\Modules\Core\Models\File;
use TypiCMS\Modules\Core\Traits\Historable;
use TypiCMS\Modules\Articles\Presenters\ModulePresenter;

/**
 * @property int $image_id
 * @property File image
 * @property string thumb
 * @property boolean $status
 * @property Carbon $published_at
 * @property string published_full
 * @property string published_date
 * @property string $title
 * @property string $slug
 * @property string $summary
 * @property string $body
 * @property int $author_id
 * @property Author author
 * @property string $location
 */
class Article extends Base
{
    use HasTranslations;
    use Historable;
    use PresentableTrait;

    protected $presenter = ModulePresenter::class;

    protected $guarded = [];

    protected $appends = ['thumb', 'published_full'];

    protected $dates = ['published_at'];

    public $translatable = [
        'title',
        'slug',
        'status',
        'summary',
        'body',
        'location'
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

    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class, 'author_id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Blogcategory::class, 'category_id');
    }

    public function publishedFull(): Attribute
    {
        return new Attribute(
            get: fn () => $this->published_at->format('Y-m-d H:i:s'),
        );
    }

    public function publishedDate(): Attribute
    {
        return new Attribute(
            get: fn () => $this->published_at->format('Y-m-d'),
        );
    }
}
