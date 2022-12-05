<?php


namespace TypiCMS\Modules\Pageoptions\Composers;


use Illuminate\Contracts\View\View;

class NameForInputComposer
{
    public function compose(View $view)
    {
        if($view->name){
            $view->nameForInput = implode('', array_map(function($el){
                return '['.$el.']';
            }, explode('.', $view->name)));
        }
    }
}
