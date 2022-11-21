<?php

namespace TypiCMS\Modules\Teammembers\Http\Requests;

use TypiCMS\Modules\Core\Http\Requests\AbstractFormRequest;

class SocialFormRequest extends AbstractFormRequest
{
    public function rules()
    {
        return [
            'image_id' => 'nullable|integer',
            'title' => 'nullable|max:255',
            'status.*' => 'boolean',
            'link' => 'nullable|max:255',
            'teammember_id' => 'required',
        ];
    }
}
