<?php

namespace TypiCMS\Modules\Broadcasts\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Route;
use Laracasts\Presenter\PresentableTrait;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;
use TypiCMS\Modules\Core\Models\Base;
use TypiCMS\Modules\Broadcasts\Presenters\AddressModulePresenter;

/**
 * Class Address
 * @package TypiCMS\Modules\Broadcasts\Models
 *
 * @property string address
 * @property integer broadcast_id
 * @property Broadcast broadcast
 */
class BroadcastAddress extends Base implements Sortable
{
    use PresentableTrait;
    use SortableTrait;

    protected $presenter = AddressModulePresenter::class;

    protected $guarded = [];

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
        $route = $locale.'::broadcast-address';
        if (Route::has($route)) {
            return route($route, ['slug'=> $this->broadcast->translate('slug', $locale), 'addressSlug' => $this->translate('slug', $locale)]);
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
        $route = 'admin::edit-broadcast_address';
        if (Route::has($route)) {
            return route($route, ['broadcast' => $this->broadcast_id, 'address' => $this->id]);
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
