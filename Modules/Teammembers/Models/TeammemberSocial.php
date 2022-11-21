<?php

namespace TypiCMS\Modules\Teammembers\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Route;
use Laracasts\Presenter\PresentableTrait;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;
use Spatie\Translatable\HasTranslations;
use TypiCMS\Modules\Core\Models\Base;
use TypiCMS\Modules\Core\Models\File;
use TypiCMS\Modules\Core\Traits\Historable;
use TypiCMS\Modules\Teammembers\Presenters\SocialModulePresenter;

/**
 * Class Social
 * @package TypiCMS\Modules\Teammembers\Models
 *
 * @property string title
 * @property bool status
 * @property string slug
 * @property string summary
 * @property string body
 * @property integer teammember_id
 * @property Teammember teammember
 */
class TeammemberSocial extends Base implements Sortable
{
    use HasTranslations;
    use Historable;
    use PresentableTrait;
    use SortableTrait;

    protected $presenter = SocialModulePresenter::class;

    protected $guarded = [];

    public $translatable = [
        'status',
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
        $route = $locale.'::teammember-social';
        if (Route::has($route)) {
            return route($route, ['slug'=> $this->teammember->translate('slug', $locale), 'socialSlug' => $this->translate('slug', $locale)]);
        }

        return '/';
    }

    public function buildSortQuery()
    {
        return static::where('teammember_id', $this->teammember_id);
    }

    public function teammember(): BelongsTo
    {
        return $this->belongsTo(Teammember::class, 'teammember_id');
    }

    public function editUrl(): string
    {
        $route = 'admin::edit-teammember_social';
        if (Route::has($route)) {
            return route($route, ['teammember' => $this->teammember_id, 'social' => $this->id]);
        }

        return route('admin::dashboard');
    }

    public function indexUrl(): string
    {
        $route = 'admin::edit-teammember';
        if (Route::has($route)) {
            return route($route, $this->teammember_id);
        }

        return route('admin::dashboard');
    }


}
