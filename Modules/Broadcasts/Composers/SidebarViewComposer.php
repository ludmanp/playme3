<?php

namespace TypiCMS\Modules\Broadcasts\Composers;

use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;
use Maatwebsite\Sidebar\SidebarGroup;
use Maatwebsite\Sidebar\SidebarItem;

class SidebarViewComposer
{
    public function compose(View $view)
    {
        if (Gate::denies('read broadcasts')) {
            return;
        }
        $view->sidebar->group(__('Content'), function (SidebarGroup $group) {
            $group->id = 'content';
            $group->weight = 30;
            $group->addItem(__('Broadcasts'), function (SidebarItem $item) {
                $item->id = 'broadcasts';
                $item->icon = config('typicms.modules.broadcasts.sidebar.icon');
                $item->weight = config('typicms.modules.broadcasts.sidebar.weight');
                $item->route('admin::index-broadcasts');
//                $item->append('admin::create-broadcast');
            });
        });
    }
}
