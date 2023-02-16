<?php

namespace TypiCMS\Modules\Contactforms\Http\Requests;

use TypiCMS\Modules\Core\Http\Requests\AbstractFormRequest;

class FormRequest extends AbstractFormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|max:255',
            'message' => 'required|max:1000',
            'agree_privacy_policy' => 'required|boolean',
        ];
    }
}
