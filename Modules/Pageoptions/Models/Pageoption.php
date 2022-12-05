<?php

namespace TypiCMS\Modules\Pageoptions\Models;

use Laracasts\Presenter\PresentableTrait;
use TypiCMS\Modules\Core\Models\Base;
use TypiCMS\Modules\Core\Traits\HasFiles;
use TypiCMS\Modules\Core\Traits\Historable;
use TypiCMS\Modules\Pageoptions\Presenters\ModulePresenter;

class Pageoption extends Base
{
    use HasFiles;
    use Historable;
    use PresentableTrait;

    protected $presenter = ModulePresenter::class;

    protected $guarded = ['id', 'exit'];

    protected $casts = ['options' => 'array'];
}
