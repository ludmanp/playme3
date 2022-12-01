<?php


namespace TypiCMS\Modules\Pageoptions\Observers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use TypiCMS\Modules\Pageoptions\Models\Pageoption;

class PageoptionsArrayObserver
{
    public function saving(Model $model)
    {
        if(empty($model->options)){
            $model->options = [];
        }

    }
}
