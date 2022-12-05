<?php


namespace TypiCMS\Modules\Pageoptions\Observers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use TypiCMS\Modules\Pageoptions\Models\Pageoption;

class PageOptionsObserver
{
    public function saving(Model $model)
    {
        $model->__unset('options');
    }

    public function saved(Model $model)
    {
        if (request()->get('id') != $model->id) {
            return;
        }
        if(!request()->has('options')){
            return;
        }
        $pageOptions = Pageoption::where('page_id', $model->id)->first();
        if (!$pageOptions) {
            $pageOptions = new Pageoption();
        }
        $pageOptions->page_id = $model->id;
        $pageOptions->options = request()->options;
        $pageOptions->save();
    }
}
