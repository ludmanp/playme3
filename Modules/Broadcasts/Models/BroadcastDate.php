<?php

namespace TypiCMS\Modules\Broadcasts\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Laracasts\Presenter\PresentableTrait;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;
use Spatie\Translatable\HasTranslations;
use TypiCMS\Modules\Core\Models\Base;
use TypiCMS\Modules\Files\Models\File;
use TypiCMS\Modules\Files\Traits\HasFiles;
use TypiCMS\Modules\History\Traits\Historable;
use TypiCMS\Modules\Broadcasts\Presenters\DateModulePresenter;

/**
 * Class Date
 * @package TypiCMS\Modules\Broadcasts\Models
 *
 * @property string title
 * @property bool status
 * @property string slug
 * @property string summary
 * @property string body
 * @property integer broadcast_id
 * @property Broadcast broadcast
 */
class BroadcastDate extends Base implements Sortable
{
    use HasFiles;
    use HasTranslations;
    use Historable;
    use PresentableTrait;
    use SortableTrait;

    protected $presenter = DateModulePresenter::class;

    protected $guarded = [];

    public $translatable = [
        'title',
        'slug',
        'status',
        'summary',
        'body',
    ];

    public function getThumbAttribute(): string
    {
        return $this->present()->image(null, 54);
    }

    public function image(): BelongsTo
    {
        return $this->belongsTo(File::class, 'image_id');
    }

    public function previewUri(): string
    {
        $uri = '/';
        if ($this->id) {
            $uri = $this->uri();
        }

        return url($uri);
    }

    public function uri($locale = null): string
    {
        $locale = $locale ?: config('app.locale');
        $route = $locale.'::broadcast-date';
        if (Route::has($route)) {
            return route($route, ['slug'=> $this->broadcast->translate('slug', $locale), 'dateSlug' => $this->translate('slug', $locale)]);
        }

        return '/';
    }

    public function buildSortQuery()
    {
        return static::where('broadcast_id', $this->broadcast_id);
    }

    public function broadcast(): BelongsTo
    {
        return $this->belongsTo(Broadcast::class, 'broadcast_id');
    }

    public function editUrl(): string
    {
        $route = 'admin::edit-broadcast_date';
        if (Route::has($route)) {
            return route($route, ['broadcast' => $this->broadcast_id, 'date' => $this->id]);
        }

        return route('admin::dashboard');
    }

    public function indexUrl(): string
    {
        $route = 'admin::edit-broadcast';
        if (Route::has($route)) {
            return route($route, $this->broadcast_id);
        }

        return route('admin::dashboard');
    }


}
