<?php

namespace TypiCMS\Modules\Core\Http\Controllers\Traits;

trait WithTags
{
    private function selectedTags(): array
    {
        $selectedTags = request()->query('tag') ?? [];
        if(!is_array($selectedTags)) {
            $selectedTags = [$selectedTags];
        }
        return $selectedTags;
    }

}
