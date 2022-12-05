<?php

namespace TypiCMS\Modules\Clients\Http\Requests;

use TypiCMS\Modules\Core\Http\Requests\AbstractFormRequest;

class FormRequest extends AbstractFormRequest
{
    public function rules()
    {
        return [
            'image_id' => 'nullable|integer',
            'title.*' => 'nullable|max:255',
            'status.*' => 'boolean',
            'link.*' => 'nullable',
        ];
    }
}
