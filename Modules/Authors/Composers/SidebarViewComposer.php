<?php

namespace TypiCMS\Modules\Authors\Composers;

use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;
use Maatwebsite\Sidebar\SidebarGroup;
use Maatwebsite\Sidebar\SidebarItem;

class SidebarViewComposer
{
    public function compose(View $view)
    {
        if (Gate::denies('read authors')) {
            return;
        }
        $view->sidebar->group(__('Blog'), function (SidebarGroup $group) {
            $group->id = 'blog';
            $group->weight = 15;
            $group->addItem(__('Authors'), function (SidebarItem $item) {
                $item->id = 'authors';
                $item->icon = config('typicms.modules.authors.sidebar.icon');
                $item->weight = config('typicms.modules.authors.sidebar.weight');
                $item->route('admin::index-authors');
                $item->append('admin::create-author');
            });
        });
    }
}
