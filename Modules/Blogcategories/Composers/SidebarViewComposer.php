<?php

namespace TypiCMS\Modules\Blogcategories\Composers;

use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;
use Maatwebsite\Sidebar\SidebarGroup;
use Maatwebsite\Sidebar\SidebarItem;

class SidebarViewComposer
{
    public function compose(View $view)
    {
        if (Gate::denies('read blogcategories')) {
            return;
        }
        $view->sidebar->group(__('Blog'), function (SidebarGroup $group) {
            $group->id = 'blog';
            $group->weight = 15;
            $group->addItem(__('Categories'), function (SidebarItem $item) {
                $item->id = 'blogcategories';
                $item->icon = config('typicms.modules.blogcategories.sidebar.icon');
                $item->weight = config('typicms.modules.blogcategories.sidebar.weight');
                $item->route('admin::index-blogcategories');
                $item->append('admin::create-blogcategory');
            });
        });
    }
}
