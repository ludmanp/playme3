<?php

namespace TypiCMS\Modules\Broadcasts\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Laracasts\Presenter\PresentableTrait;
use Ramsey\Collection\Collection;
use TypiCMS\Modules\Core\Models\Base;
use TypiCMS\Modules\Core\Models\File;
use TypiCMS\Modules\Core\Models\User;
use TypiCMS\Modules\Core\Traits\Historable;
use TypiCMS\Modules\Broadcasts\Presenters\ModulePresenter;

/**
 * Class
 *
 * @property integer $user_id
 * @property User user
 * @property string $image_id
 * @property File image
 * @property string thumb
 * @property string $lang
 * @property string $title
 * @property string $summary
 * @property string $external_id
 * @property string $contact_name
 * @property string $contact_phone
 * @property string $contact_email
 * @property string $leader_name
 * @property string $leader_phone
 * @property string $leader_email
 * @property string $company
 * @property string $registration_nr
 * @property string $legal_address
 * @property string $company_phone
 * @property string $company_email
 * @property boolean $is_public
 * @property string $parameters
 * @property string $embed_script
 * @property BroadcastAddress[] | Collection addresses
 * @property BroadcastAddress first_address
 * @property BroadcastDate[] | Collection dates
 * @property BroadcastDate first_date
 * @property string slug
 *
 * @method ModulePresenter present()
 */
class Broadcast extends Base
{
    use Historable;
    use PresentableTrait;

    protected $presenter = ModulePresenter::class;

    protected $guarded = ['addresses', 'dates'];

    protected $appends = ['thumb', 'slug'];

    protected $casts = ['parameters' => 'array'];

    /**
     * @return void
     */
    public static function boot() {

        parent::boot();

        static::creating(function(self $model) {

            if(!$model->user_id && auth()->check()) {
                $model->user_id = auth()->id();
            }
            if(!$model->lang) {
                $model->lang = config('app.locale');
            }
            if(!$model->external_id) {
                $model->external_id = Str::uuid();
            }
        });
    }

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

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function addresses(): HasMany
    {
        return $this->hasMany(BroadcastAddress::class, 'broadcast_id')->order();
    }

    public function first_address(): HasOne
    {
        return $this->hasOne(BroadcastAddress::class, 'broadcast_id')->order();
    }

    public function dates()
    {
        return $this->hasMany(BroadcastDate::class, 'broadcast_id')->order();
    }

    public function first_date(): HasOne
    {
        return $this->hasOne(BroadcastDate::class, 'broadcast_id')->order();
    }



    /**
     * Get broadcast's slug value
     *
     * @return Attribute
     */
    protected function slug(): Attribute
    {
        return Attribute::make(
            get: fn () => strval($this->external_id ?? $this->id),
        );
    }

    public function uri($locale = null): string
    {
        $locale = $locale ?: config('app.locale');
        $route = $locale.'::'.Str::singular($this->getTable());
        if (Route::has($route)) {
            return route($route, $this->slug);
        }

        return url('/');
    }

    public function scopeWhereSlugIs($query, $slug): Builder
    {
        return $query->where('external_id', $slug);
    }

    public function scopeAuthorised($query): Builder
    {
        return $query->where('user_id', auth()->id());
    }
}
