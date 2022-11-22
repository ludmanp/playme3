<?php

namespace TypiCMS\Modules\Articles\Composers;

use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;
use Maatwebsite\Sidebar\SidebarGroup;
use Maatwebsite\Sidebar\SidebarItem;

class SidebarViewComposer
{
    public function compose(View $view)
    {
        if (Gate::denies('read articles')) {
            return;
        }
        $view->sidebar->group(__('Blog'), function (SidebarGroup $group) {
            $group->id = 'blog';
            $group->weight = 15;
            $group->addItem(__('Articles'), function (SidebarItem $item) {
                $item->id = 'articles';
                $item->icon = config('typicms.modules.articles.sidebar.icon');
                $item->weight = config('typicms.modules.articles.sidebar.weight');
                $item->route('admin::index-articles');
                $item->append('admin::create-article');
            });
        });
    }
}
