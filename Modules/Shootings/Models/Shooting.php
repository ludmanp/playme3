<?php

namespace TypiCMS\Modules\Shootings\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laracasts\Presenter\PresentableTrait;
use Ramsey\Collection\Collection;
use TypiCMS\Modules\Broadcasts\Enums\StatusEnum;
use TypiCMS\Modules\Core\Models\Base;
use TypiCMS\Modules\Core\Models\User;
use TypiCMS\Modules\Core\Traits\Historable;
use TypiCMS\Modules\Shootings\Presenters\ModulePresenter;

/**
 * Class
 *
 * @property integer $user_id
 * @property User user
 * @property string $image_id
 * @property StatusEnum $status
 * @property string $lang
 * @property string $title
 * @property string $summary
 * @property string $products
 * @property bool $think_yourself
 * @property string $leader_name
 * @property string $leader_phone
 * @property string $leader_email
 * @property string $company
 * @property string $registration_nr
 * @property string $legal_address
 * @property string $company_phone
 * @property string $company_email
 * @property string $parameters
 * @property ShootingAddress[] | Collection addresses
 * @property ShootingAddress first_address
 * @property ShootingDate[] | Collection dates
 * @property ShootingDate first_date
 * @property string slug
 *
 * @method ModulePresenter present()
 */
class Shooting extends Base
{
    use Historable;
    use PresentableTrait;
    use SoftDeletes;

    protected $presenter = ModulePresenter::class;

    protected $guarded = ['addresses', 'dates'];

    protected $appends = ['slug'];

    protected $casts = [
        'products' => 'array',
        'parameters' => 'array',
        'status' => StatusEnum::class,
    ];

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
        });
    }

    /**
     * Get broadcast's slug value
     *
     * @return Attribute
     */
    protected function slug(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->id,
        );
    }

    public function addresses(): HasMany
    {
        return $this->hasMany(ShootingAddress::class, 'shooting_id')->order();
    }

    public function first_address(): HasOne
    {
        return $this->hasOne(ShootingAddress::class, 'shooting_id')->order();
    }

    public function dates()
    {
        return $this->hasMany(ShootingDate::class, 'shooting_id')->order();
    }

    public function first_date(): HasOne
    {
        return $this->hasOne(ShootingDate::class, 'shooting_id')->order();
    }

    public function scopeWhereSlugIs($query, $slug): Builder
    {
        return $query->where('id', $slug);
    }

    public function scopeAuthorised($query): Builder
    {
        return $query->where('user_id', auth()->id());
    }

}
