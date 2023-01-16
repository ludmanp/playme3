<?php

namespace TypiCMS\Modules\Projects\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Laracasts\Presenter\PresentableTrait;
use Spatie\Translatable\HasTranslations;
use TypiCMS\Modules\Clients\Models\Client;
use TypiCMS\Modules\Core\Models\Base;
use TypiCMS\Modules\Core\Models\File;
use TypiCMS\Modules\Core\Traits\HasFiles;
use TypiCMS\Modules\Core\Traits\HasTags;
use TypiCMS\Modules\Core\Traits\Historable;
use TypiCMS\Modules\Projects\Presenters\ModulePresenter;
use TypiCMS\Modules\Teammembers\Models\Teammember;

/**
 * Class Project
 *
 * @property integer $image_id
 * @property string thumb
 * @property File image
 * @property integer $client_id
 * @property Client client
 * @property boolean $status
 * @property string $title
 * @property string $slug
 * @property string $summary
 * @property string $body
 * @property Carbon $date
 * @property string $location
 * @property Teammember[]|Collection team_members
 *
 * @method ModulePresenter present()
 */
class Project extends Base
{
    use HasFiles;
    use HasTranslations;
    use Historable;
    use PresentableTrait;
    use HasTags;


    protected $presenter = ModulePresenter::class;

    protected $guarded = ['teammembers'];

    protected $appends = ['thumb'];

    protected $dates = ['date'];

    public $translatable = [
        'title',
        'slug',
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

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    public function team_members(): BelongsToMany
    {
        return $this->belongsToMany(
            Teammember::class,
            'project_teammember',
            'teammember_id',
            'project_id'
        );
    }
}
