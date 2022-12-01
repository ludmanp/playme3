<?php


namespace TypiCMS\Modules\Pageoptions\Composers;


use Illuminate\Contracts\View\View;
use TypiCMS\Modules\Pageoptions\Models\Pageoption;
use TypiCMS\Modules\Core\Models\Page;

class PageTemplateOptionsComposer
{
    public function compose(View $view)
    {
        if($view->model && $view->model instanceof Page && is_null($view->model->options)){
            $pageOptions = Pageoption::where('page_id', $view->model->id)->first();
            if($pageOptions){
                $view->model->options = $pageOptions->options;
            }
        }
    }
}
