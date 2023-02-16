<?php

namespace TypiCMS\Modules\Broadcasts\Http\Requests;

use TypiCMS\Modules\Core\Http\Requests\AbstractFormRequest;

class DateFormRequest extends AbstractFormRequest
{
    public function rules()
    {
        return [
            'starts_at' => 'required|date',
            'arrive_at' => 'required|date',
            'broadcast_id' => 'required',
        ];
    }
}
