<?php

namespace TypiCMS\Modules\Clients\Composers;

use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;
use Maatwebsite\Sidebar\SidebarGroup;
use Maatwebsite\Sidebar\SidebarItem;

class SidebarViewComposer
{
    public function compose(View $view)
    {
        if (Gate::denies('read clients')) {
            return;
        }
        $view->sidebar->group(__('Content'), function (SidebarGroup $group) {
            $group->id = 'content';
            $group->weight = 30;
            $group->addItem(__('Clients'), function (SidebarItem $item) {
                $item->id = 'clients';
                $item->icon = config('typicms.modules.clients.sidebar.icon');
                $item->weight = config('typicms.modules.clients.sidebar.weight');
                $item->route('admin::index-clients');
                $item->append('admin::create-client');
            });
        });
    }
}
