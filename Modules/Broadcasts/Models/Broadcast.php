<?php

namespace TypiCMS\Modules\Broadcasts\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Laracasts\Presenter\PresentableTrait;
use Spatie\Translatable\HasTranslations;
use TypiCMS\Modules\Core\Models\Base;
use TypiCMS\Modules\Core\Models\File;
use TypiCMS\Modules\Core\Traits\HasFiles;
use TypiCMS\Modules\Core\Traits\Historable;
use TypiCMS\Modules\Broadcasts\Presenters\ModulePresenter;

class Broadcast extends Base
{
    use Historable;
    use PresentableTrait;

    protected $presenter = ModulePresenter::class;

    protected $guarded = [];

    protected $appends = ['thumb'];

    protected $casts = ['parameters'];

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

    public function addresses()
    {
        return $this->hasMany(BroadcastAddress::class, 'broadcast_id');
    }

    public function dates()
    {
        return $this->hasMany(BroadcastDate::class, 'broadcast_id');
    }
}
