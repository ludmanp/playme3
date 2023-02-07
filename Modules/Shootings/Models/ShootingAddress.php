<?php

namespace TypiCMS\Modules\Shootings\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Route;
use Laracasts\Presenter\PresentableTrait;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;
use TypiCMS\Modules\Shootings\Models\Shooting;
use TypiCMS\Modules\Core\Models\Base;
use TypiCMS\Modules\Shootings\Presenters\AddressModulePresenter;

/**
 * Class Address
 * @package TypiCMS\Modules\Shootings\Models
 *
 * @property string address
 * @property integer shooting_id
 * @property Shooting shooting
 */
class ShootingAddress extends Base implements Sortable
{
    use PresentableTrait;
    use SortableTrait;

    protected $presenter = AddressModulePresenter::class;

    protected $guarded = [];

    public function title(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->address,
        );
    }

    public function buildSortQuery()
    {
        return static::where('shooting_id', $this->shooting_id);
    }

    public function shooting(): BelongsTo
    {
        return $this->belongsTo(Shooting::class, 'shooting_id');
    }

    public function editUrl(): string
    {
        $route = 'admin::edit-shooting_address';
        if (Route::has($route)) {
            return route($route, ['shooting' => $this->shooting_id, 'address' => $this->id]);
        }

        return route('admin::dashboard');
    }

    public function indexUrl(): string
    {
        $route = 'admin::edit-shooting';
        if (Route::has($route)) {
            return route($route, ['shooting' => $this->shooting_id]);
        }

        return route('admin::dashboard');
    }


}
