<?php

namespace TypiCMS\Modules\Core\Http\Requests;

class TagsFormRequest extends AbstractFormRequest
{
    public function rules()
    {
        return [
            'tag.*' => 'nullable|max:255',
            'slug.*' => 'nullable|max:255|alpha_dash|required_with:tag.*',
        ];
    }
}
