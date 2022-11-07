<?php

namespace TypiCMS\Modules\Services\Composers;

use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;
use Maatwebsite\Sidebar\SidebarGroup;
use Maatwebsite\Sidebar\SidebarItem;

class SidebarViewComposer
{
    public function compose(View $view)
    {
        if (Gate::denies('read services')) {
            return;
        }
        $view->sidebar->group(__('Services'), function (SidebarGroup $group) {
            $group->id = 'services';
            $group->weight = 25;
            $group->addItem(__('Services'), function (SidebarItem $item) {
                $item->id = 'services';
                $item->icon = config('typicms.modules.services.sidebar.icon');
                $item->weight = config('typicms.modules.services.sidebar.weight');
                $item->route('admin::index-services');
                $item->append('admin::create-service');
            });
        });
    }
}
