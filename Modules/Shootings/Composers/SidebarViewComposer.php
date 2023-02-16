<?php

namespace TypiCMS\Modules\Shootings\Composers;

use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;
use Maatwebsite\Sidebar\SidebarGroup;
use Maatwebsite\Sidebar\SidebarItem;

class SidebarViewComposer
{
    public function compose(View $view)
    {
        if (Gate::denies('read shootings')) {
            return;
        }
        $view->sidebar->group(__('Content'), function (SidebarGroup $group) {
            $group->id = 'content';
            $group->weight = 30;
            $group->addItem(__('Shootings'), function (SidebarItem $item) {
                $item->id = 'shootings';
                $item->icon = config('typicms.modules.shootings.sidebar.icon');
                $item->weight = config('typicms.modules.shootings.sidebar.weight');
                $item->route('admin::index-shootings');
//                $item->append('admin::create-shooting');
            });
        });
    }
}
