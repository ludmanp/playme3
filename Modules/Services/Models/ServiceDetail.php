<?php

namespace TypiCMS\Modules\Services\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Laracasts\Presenter\PresentableTrait;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;
use Spatie\Translatable\HasTranslations;
use TypiCMS\Modules\Core\Models\Base;
use TypiCMS\Modules\Core\Traits\HasFiles;
use TypiCMS\Modules\Core\Models\File;
use TypiCMS\Modules\Core\Traits\Historable;
use TypiCMS\Modules\Services\Presenters\DetailModulePresenter;

/**
 * Class Detail
 * @package TypiCMS\Modules\Services\Models
 *
 * @property int image_id
 * @property File image
 * @property string thumb
 * @property string title
 * @property bool status
 * @property string slug
 * @property string summary
 * @property integer service_id
 * @property Service service
 */
class ServiceDetail extends Base implements Sortable
{
    use HasFiles;
    use HasTranslations;
    use Historable;
    use PresentableTrait;
    use SortableTrait;

    protected $presenter = DetailModulePresenter::class;

    protected $guarded = [];

    protected $appends = ['thumb'];

    public $translatable = [
        'title',
        'slug',
        'status',
        'summary',
        'body',
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
        $route = $locale.'::service-detail';
        if (Route::has($route)) {
            return route($route, ['slug'=> $this->service->translate('slug', $locale), 'detailSlug' => $this->translate('slug', $locale)]);
        }

        return '/';
    }

    public function buildSortQuery()
    {
        return static::where('service_id', $this->service_id);
    }

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class, 'service_id');
    }

    public function editUrl(): string
    {
        $route = 'admin::edit-service_detail';
        if (Route::has($route)) {
            return route($route, ['service' => $this->service_id, 'detail' => $this->id]);
        }

        return route('admin::dashboard');
    }

    public function indexUrl(): string
    {
        $route = 'admin::edit-service';
        if (Route::has($route)) {
            return route($route, $this->service_id);
        }

        return route('admin::dashboard');
    }


}
