<?php

namespace TypiCMS\Modules\Facts\Composers;

use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;
use Maatwebsite\Sidebar\SidebarGroup;
use Maatwebsite\Sidebar\SidebarItem;

class SidebarViewComposer
{
    public function compose(View $view)
    {
        if (Gate::denies('read facts')) {
            return;
        }
        $view->sidebar->group(__('Content'), function (SidebarGroup $group) {
            $group->id = 'content';
            $group->weight = 30;
            $group->addItem(__('Facts'), function (SidebarItem $item) {
                $item->id = 'facts';
                $item->icon = config('typicms.modules.facts.sidebar.icon');
                $item->weight = config('typicms.modules.facts.sidebar.weight');
                $item->route('admin::index-facts');
                $item->append('admin::create-fact');
            });
        });
    }
}
