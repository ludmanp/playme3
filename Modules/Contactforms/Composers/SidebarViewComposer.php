<?php

namespace TypiCMS\Modules\Contactforms\Composers;

use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;
use Maatwebsite\Sidebar\SidebarGroup;
use Maatwebsite\Sidebar\SidebarItem;

class SidebarViewComposer
{
    public function compose(View $view)
    {
        if (Gate::denies('read contactforms')) {
            return;
        }
        $view->sidebar->group(__('Content'), function (SidebarGroup $group) {
            $group->id = 'content';
            $group->weight = 30;
            $group->addItem(__('Contactforms'), function (SidebarItem $item) {
                $item->id = 'contactforms';
                $item->icon = config('typicms.modules.contactforms.sidebar.icon');
                $item->weight = config('typicms.modules.contactforms.sidebar.weight');
                $item->route('admin::index-contactforms');
                $item->append('admin::create-contactform');
            });
        });
    }
}
