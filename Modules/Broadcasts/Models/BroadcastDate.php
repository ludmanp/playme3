<?php

namespace TypiCMS\Modules\Broadcasts\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Route;
use Laracasts\Presenter\PresentableTrait;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;
use TypiCMS\Modules\Core\Models\Base;
use TypiCMS\Modules\Broadcasts\Presenters\DateModulePresenter;

/**
 * Class Date
 * @package TypiCMS\Modules\Broadcasts\Models
 *
 * @property Carbon $starts_at
 * @property string date
 * @property string start_time
 * @property Carbon $arrive_at
 * @property string arrive_time
 * @property integer $broadcast_id
 * @property Broadcast broadcast
 */
class BroadcastDate extends Base implements Sortable
{
    use PresentableTrait;
    use SortableTrait;

    protected $presenter = DateModulePresenter::class;

    protected $guarded = [];

    protected $dates = ['starts_at', 'arrive_at'];

    protected $appends = ['arrive_time', 'title'];

    public function title(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->starts_at ? $this->starts_at->format('d.m.Y H:i') : '-',
        );
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

    public function date(): Attribute
    {
        return new Attribute(
            get: fn () => $this->starts_at->format('Y-m-d'),
        );
    }

    public function startTime(): Attribute
    {
        return new Attribute(
            get: fn () => $this->starts_at->format('H:i'),
        );
    }

    public function arriveTime(): Attribute
    {
        return new Attribute(
            get: fn () => $this->arrive_at->format('H:i'),
        );
    }

}
