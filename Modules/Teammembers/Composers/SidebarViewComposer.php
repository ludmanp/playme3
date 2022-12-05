<?php

namespace TypiCMS\Modules\Teammembers\Composers;

use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;
use Maatwebsite\Sidebar\SidebarGroup;
use Maatwebsite\Sidebar\SidebarItem;

class SidebarViewComposer
{
    public function compose(View $view)
    {
        if (Gate::denies('read teammembers')) {
            return;
        }
        $view->sidebar->group(__('Content'), function (SidebarGroup $group) {
            $group->id = 'content';
            $group->weight = 30;
            $group->addItem(__('Teammembers'), function (SidebarItem $item) {
                $item->id = 'teammembers';
                $item->icon = config('typicms.modules.teammembers.sidebar.icon');
                $item->weight = config('typicms.modules.teammembers.sidebar.weight');
                $item->route('admin::index-teammembers');
                $item->append('admin::create-teammember');
            });
        });
    }
}
