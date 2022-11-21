<?php

namespace TypiCMS\Modules\Facts\Http\Requests;

use TypiCMS\Modules\Core\Http\Requests\AbstractFormRequest;

class FormRequest extends AbstractFormRequest
{
    public function rules()
    {
        return [
            'image_id' => 'nullable|integer',
            'title.*' => 'nullable|max:255',
            'number' => 'nullable|integer',
            'status.*' => 'boolean',
            'link.*' => 'nullable|max:255',
            'link_title.*' => 'nullable|max:255',
        ];
    }
}
