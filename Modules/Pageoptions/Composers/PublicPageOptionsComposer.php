<?php


namespace TypiCMS\Modules\Pageoptions\Composers;


use Illuminate\Contracts\View\View;
use TypiCMS\Modules\Pageoptions\Models\Pageoption;

class PublicPageOptionsComposer
{
    public function compose(View $view)
    {
        if($view->page){
            $pageOptions = Pageoption::where('page_id', $view->page->id)->first();
            if(!$pageOptions){
                $pageOptions = new Pageoption;
            }
            $view->pageOptions = $pageOptions;
        }
    }
}
