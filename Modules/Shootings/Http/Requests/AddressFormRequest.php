<?php

namespace TypiCMS\Modules\Shootings\Http\Requests;

use TypiCMS\Modules\Core\Http\Requests\AbstractFormRequest;

class AddressFormRequest extends AbstractFormRequest
{
    public function rules()
    {
        return [
            'address' => 'nullable|max:255',
            'shooting_id' => 'required',
        ];
    }
}
