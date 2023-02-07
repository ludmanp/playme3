<?php

namespace TypiCMS\Modules\Shootings\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Route;
use Laracasts\Presenter\PresentableTrait;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;
use TypiCMS\Modules\Core\Models\Base;
use TypiCMS\Modules\Shootings\Presenters\DateModulePresenter;

/**
 * Class Date
 * @package TypiCMS\Modules\Shootings\Models
 *
 * @property Carbon $date
 * @property string title
 * @property integer $shooting_id
 * @property Shooting shooting
 */
class ShootingDate extends Base implements Sortable
{
    use PresentableTrait;
    use SortableTrait;

    protected $presenter = DateModulePresenter::class;

    protected $guarded = [];

    protected $dates = ['date'];

    protected $appends = ['title'];

    public function title(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->starts_at ? $this->starts_at->format('d.m.Y H:i') : '-',
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
        $route = 'admin::edit-shooting_date';
        if (Route::has($route)) {
            return route($route, ['shooting' => $this->shooting_id, 'date' => $this->id]);
        }

        return route('admin::dashboard');
    }

    public function indexUrl(): string
    {
        $route = 'admin::edit-shooting';
        if (Route::has($route)) {
            return route($route, $this->shooting_id);
        }

        return route('admin::dashboard');
    }
}
