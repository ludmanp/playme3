<?php

namespace TypiCMS\Modules\Broadcasts\Http\Requests;

use TypiCMS\Modules\Core\Http\Requests\AbstractFormRequest;

class AddressFormRequest extends AbstractFormRequest
{
    public function rules()
    {
        return [
            'address' => 'nullable|max:255',
            'broadcast_id' => 'required',
        ];
    }
}
