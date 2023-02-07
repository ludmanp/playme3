<?php

namespace TypiCMS\Modules\Shootings\Http\Requests;

use TypiCMS\Modules\Core\Http\Requests\AbstractFormRequest;

class DateFormRequest extends AbstractFormRequest
{
    public function rules()
    {
        return [
            'date' => 'required|date',
            'shooting_id' => 'required',
        ];
    }
}
