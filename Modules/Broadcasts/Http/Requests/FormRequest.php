<?php

namespace TypiCMS\Modules\Broadcasts\Http\Requests;

use Illuminate\Validation\Rule;
use TypiCMS\Modules\Broadcasts\Enums\StatusEnum;
use TypiCMS\Modules\Core\Http\Requests\AbstractFormRequest;

class FormRequest extends AbstractFormRequest
{
    public function rules()
    {
        return [
            'image_id' => 'nullable|integer',
            'title' => 'required|max:255',
            'status' => ['sometimes', Rule::in(array_keys(StatusEnum::forSelect()))],
            'summary' => 'required|max:1000',
            'contact_name' => 'required|max:255',
            'contact_phone' => 'required|max:255',
            'contact_email' => 'required|email',
            'leader_name' => 'nullable|max:255',
            'leader_phone' => 'nullable|max:255',
            'leader_email' => 'nullable|email',
            'company' => 'nullable|max:255',
            'registration_nr' => 'nullable|max:255',
            'legal_address' => 'nullable|max:255',
            'company_phone' => 'nullable|max:255',
            'company_email' => 'nullable|email',
            'is_public' => 'nullable|boolean',
            'parameters' => 'array',
            'embed_script' => 'nullable|max:1000',
        ];
    }
}
