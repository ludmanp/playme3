<?php

namespace TypiCMS\Modules\Core\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Laracasts\Presenter\PresentableTrait;
use Spatie\Translatable\HasTranslations;
use TypiCMS\Modules\Core\Presenters\TagsModulePresenter;
use TypiCMS\Modules\Core\Traits\Historable;

class Tag extends Base
{
    use Historable;
    use HasTranslations;
    use PresentableTrait;

    protected $presenter = TagsModulePresenter::class;

    protected $guarded = [];

    public $translatable = [
        'tag',
        'slug',
    ];

    public $slugSource = 'tag';

    public function scopePublished(Builder $query): Builder
    {
        return $query;
    }
}
